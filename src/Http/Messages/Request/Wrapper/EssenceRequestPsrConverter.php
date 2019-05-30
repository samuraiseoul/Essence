<?php


namespace Http\Messages\Request\Wrapper;


use Essence\Http\Messages\Request\EssenceRequest;
use Essence\Http\Messages\Request\Request;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

final class EssenceRequestPsrConverter implements RequestPsrConverter
{
    public function convert(Request $request): RequestInterface
    {
        return new class($request) implements RequestInterface {
            /** @var EssenceRequest */
            private $request;

            /**
             *  constructor.
             * @param EssenceRequest $request
             */
            public function __construct(EssenceRequest $request)
            {
                $this->request = $request;
            }

            /**
             * Retrieves the HTTP protocol version as a string.
             *
             * The string MUST contain only the HTTP version number (e.g., "1.1", "1.0").
             *
             * @return string HTTP protocol version.
             */
            public function getProtocolVersion() : string
            {
                return $this->request->getStartLine()->getHTTPVersion();
            }

            /**
             * Return an instance with the specified HTTP protocol version.
             *
             * The version string MUST contain only the HTTP version number (e.g.,
             * "1.1", "1.0").
             *
             * This method MUST be implemented in such a way as to retain the
             * immutability of the message, and MUST return an instance that has the
             * new protocol version.
             *
             * @param string $version HTTP protocol version
             * @return static
             */
            public function withProtocolVersion($version) : RequestInterface
            {
                return $this;
            }

            /**
             * Retrieves all message header values.
             *
             * The keys represent the header name as it will be sent over the wire, and
             * each value is an array of strings associated with the header.
             *
             *     // Represent the headers as a string
             *     foreach ($message->getHeaders() as $name => $values) {
             *         echo $name . ": " . implode(", ", $values);
             *     }
             *
             *     // Emit headers iteratively:
             *     foreach ($message->getHeaders() as $name => $values) {
             *         foreach ($values as $value) {
             *             header(sprintf('%s: %s', $name, $value), false);
             *         }
             *     }
             *
             * While header names are not case-sensitive, getHeaders() will preserve the
             * exact case in which headers were originally specified.
             *
             * @return string[][] Returns an associative array of the message's headers. Each
             *     key MUST be a header name, and each value MUST be an array of strings
             *     for that header.
             */
            public function getHeaders()
            {
                return [];
            }

            /**
             * Checks if a header exists by the given case-insensitive name.
             *
             * @param string $name Case-insensitive header field name.
             * @return bool Returns true if any header names match the given header
             *     name using a case-insensitive string comparison. Returns false if
             *     no matching header name is found in the message.
             */
            public function hasHeader($name) : bool
            {
                return $this->request->getHeaders()->get($name) !== null;
            }

            /**
             * Retrieves a message header value by the given case-insensitive name.
             *
             * This method returns an array of all the header values of the given
             * case-insensitive header name.
             *
             * If the header does not appear in the message, this method MUST return an
             * empty array.
             *
             * @param string $name Case-insensitive header field name.
             * @return string[] An array of string values as provided for the given
             *    header. If the header does not appear in the message, this method MUST
             *    return an empty array.
             */
            public function getHeader($name) : array
            {
                return [$this->request->getHeaders()->get($name)->getHeaderValue()];
            }

            /**
             * Retrieves a comma-separated string of the values for a single header.
             *
             * This method returns all of the header values of the given
             * case-insensitive header name as a string concatenated together using
             * a comma.
             *
             * NOTE: Not all header values may be appropriately represented using
             * comma concatenation. For such headers, use getHeader() instead
             * and supply your own delimiter when concatenating.
             *
             * If the header does not appear in the message, this method MUST return
             * an empty string.
             *
             * @param string $name Case-insensitive header field name.
             * @return string A string of values as provided for the given header
             *    concatenated together using a comma. If the header does not appear in
             *    the message, this method MUST return an empty string.
             */
            public function getHeaderLine($name) : string
            {
                return $this->request->getHeaders()->get($name)->getHeaderValue();
            }

            /**
             * Return an instance with the provided value replacing the specified header.
             *
             * While header names are case-insensitive, the casing of the header will
             * be preserved by this function, and returned from getHeaders().
             *
             * This method MUST be implemented in such a way as to retain the
             * immutability of the message, and MUST return an instance that has the
             * new and/or updated header and value.
             *
             * @param string $name Case-insensitive header field name.
             * @param string|string[] $value Header value(s).
             * @return static
             * @throws \InvalidArgumentException for invalid header names or values.
             */
            public function withHeader($name, $value) : RequestInterface
            {
                return $this;
            }

            /**
             * Return an instance with the specified header appended with the given value.
             *
             * Existing values for the specified header will be maintained. The new
             * value(s) will be appended to the existing list. If the header did not
             * exist previously, it will be added.
             *
             * This method MUST be implemented in such a way as to retain the
             * immutability of the message, and MUST return an instance that has the
             * new header and/or value.
             *
             * @param string $name Case-insensitive header field name to add.
             * @param string|string[] $value Header value(s).
             * @return static
             * @throws \InvalidArgumentException for invalid header names or values.
             */
            public function withAddedHeader($name, $value) : RequestInterface
            {
                return $this;
            }

            /**
             * Return an instance without the specified header.
             *
             * Header resolution MUST be done without case-sensitivity.
             *
             * This method MUST be implemented in such a way as to retain the
             * immutability of the message, and MUST return an instance that removes
             * the named header.
             *
             * @param string $name Case-insensitive header field name to remove.
             * @return static
             */
            public function withoutHeader($name) : RequestInterface
            {
                return $this;
            }

            /**
             * Gets the body of the message.
             *
             * @return StreamInterface Returns the body as a stream.
             */
            public function getBody()
            {
                return new class implements StreamInterface {

                    /**
                     * Reads all data from the stream into a string, from the beginning to end.
                     *
                     * This method MUST attempt to seek to the beginning of the stream before
                     * reading data and read the stream until the end is reached.
                     *
                     * Warning: This could attempt to load a large amount of data into memory.
                     *
                     * This method MUST NOT raise an exception in order to conform with PHP's
                     * string casting operations.
                     *
                     * @see http://php.net/manual/en/language.oop5.magic.php#object.tostring
                     * @return string
                     */
                    public function __toString()
                    {
                        return '';
                    }

                    /**
                     * Closes the stream and any underlying resources.
                     *
                     * @return void
                     */
                    public function close()
                    {
                        // TODO: Implement close() method.
                    }

                    /**
                     * Separates any underlying resources from the stream.
                     *
                     * After the stream has been detached, the stream is in an unusable state.
                     *
                     * @return resource|null Underlying PHP stream, if any
                     */
                    public function detach()
                    {
                        return null;
                    }

                    /**
                     * Get the size of the stream if known.
                     *
                     * @return int|null Returns the size in bytes if known, or null if unknown.
                     */
                    public function getSize()
                    {
                        return null;
                    }

                    /**
                     * Returns the current position of the file read/write pointer
                     *
                     * @return int Position of the file pointer
                     * @throws \RuntimeException on error.
                     */
                    public function tell()
                    {
                        return 1;
                    }

                    /**
                     * Returns true if the stream is at the end of the stream.
                     *
                     * @return bool
                     */
                    public function eof()
                    {
                        return true;
                    }

                    /**
                     * Returns whether or not the stream is seekable.
                     *
                     * @return bool
                     */
                    public function isSeekable()
                    {
                        return true;
                    }

                    /**
                     * Seek to a position in the stream.
                     *
                     * @link http://www.php.net/manual/en/function.fseek.php
                     * @param int $offset Stream offset
                     * @param int $whence Specifies how the cursor position will be calculated
                     *     based on the seek offset. Valid values are identical to the built-in
                     *     PHP $whence values for `fseek()`.  SEEK_SET: Set position equal to
                     *     offset bytes SEEK_CUR: Set position to current location plus offset
                     *     SEEK_END: Set position to end-of-stream plus offset.
                     * @throws \RuntimeException on failure.
                     */
                    public function seek($offset, $whence = SEEK_SET)
                    {
                        // TODO: Implement seek() method.
                    }

                    /**
                     * Seek to the beginning of the stream.
                     *
                     * If the stream is not seekable, this method will raise an exception;
                     * otherwise, it will perform a seek(0).
                     *
                     * @see seek()
                     * @link http://www.php.net/manual/en/function.fseek.php
                     * @throws \RuntimeException on failure.
                     */
                    public function rewind()
                    {
                        // TODO: Implement rewind() method.
                    }

                    /**
                     * Returns whether or not the stream is writable.
                     *
                     * @return bool
                     */
                    public function isWritable()
                    {
                        return true;
                    }

                    /**
                     * Write data to the stream.
                     *
                     * @param string $string The string that is to be written.
                     * @return int Returns the number of bytes written to the stream.
                     * @throws \RuntimeException on failure.
                     */
                    public function write($string)
                    {
                        return 1;
                    }

                    /**
                     * Returns whether or not the stream is readable.
                     *
                     * @return bool
                     */
                    public function isReadable()
                    {
                        return true;
                    }

                    /**
                     * Read data from the stream.
                     *
                     * @param int $length Read up to $length bytes from the object and return
                     *     them. Fewer than $length bytes may be returned if underlying stream
                     *     call returns fewer bytes.
                     * @return string Returns the data read from the stream, or an empty string
                     *     if no bytes are available.
                     * @throws \RuntimeException if an error occurs.
                     */
                    public function read($length)
                    {
                        return '';
                    }

                    /**
                     * Returns the remaining contents in a string
                     *
                     * @return string
                     * @throws \RuntimeException if unable to read or an error occurs while
                     *     reading.
                     */
                    public function getContents()
                    {
                        return '';
                    }

                    /**
                     * Get stream metadata as an associative array or retrieve a specific key.
                     *
                     * The keys returned are identical to the keys returned from PHP's
                     * stream_get_meta_data() function.
                     *
                     * @link http://php.net/manual/en/function.stream-get-meta-data.php
                     * @param string $key Specific metadata to retrieve.
                     * @return array|mixed|null Returns an associative array if no key is
                     *     provided. Returns a specific key value if a key is provided and the
                     *     value is found, or null if the key is not found.
                     */
                    public function getMetadata($key = null)
                    {
                        return '';
                    }
                };
            }

            /**
             * Return an instance with the specified message body.
             *
             * The body MUST be a StreamInterface object.
             *
             * This method MUST be implemented in such a way as to retain the
             * immutability of the message, and MUST return a new instance that has the
             * new body stream.
             *
             * @param StreamInterface $body Body.
             * @return static
             * @throws \InvalidArgumentException When the body is not valid.
             */
            public function withBody(StreamInterface $body) : RequestInterface
            {
                return $this;
            }

            /**
             * Retrieves the message's request target.
             *
             * Retrieves the message's request-target either as it will appear (for
             * clients), as it appeared at request (for servers), or as it was
             * specified for the instance (see withRequestTarget()).
             *
             * In most cases, this will be the origin-form of the composed URI,
             * unless a value was provided to the concrete implementation (see
             * withRequestTarget() below).
             *
             * If no URI is available, and no request-target has been specifically
             * provided, this method MUST return the string "/".
             *
             * @return string
             */
            public function getRequestTarget() : string
            {
                $this->request->getStartLine()->getRequestTarget()->getPath();
            }

            /**
             * Return an instance with the specific request-target.
             *
             * If the request needs a non-origin-form request-target — e.g., for
             * specifying an absolute-form, authority-form, or asterisk-form —
             * this method may be used to create an instance with the specified
             * request-target, verbatim.
             *
             * This method MUST be implemented in such a way as to retain the
             * immutability of the message, and MUST return an instance that has the
             * changed request target.
             *
             * @link http://tools.ietf.org/html/rfc7230#section-5.3 (for the various
             *     request-target forms allowed in request messages)
             * @param mixed $requestTarget
             * @return static
             */
            public function withRequestTarget($requestTarget) : RequestInterface
            {
                return $this;
            }

            /**
             * Retrieves the HTTP method of the request.
             *
             * @return string Returns the request method.
             */
            public function getMethod() : string
            {
                return $this->request->getStartLine()->getHTTPMethod();
            }

            /**
             * Return an instance with the provided HTTP method.
             *
             * While HTTP method names are typically all uppercase characters, HTTP
             * method names are case-sensitive and thus implementations SHOULD NOT
             * modify the given string.
             *
             * This method MUST be implemented in such a way as to retain the
             * immutability of the message, and MUST return an instance that has the
             * changed request method.
             *
             * @param string $method Case-sensitive method.
             * @return static
             * @throws \InvalidArgumentException for invalid HTTP methods.
             */
            public function withMethod($method) : RequestInterface
            {
                return $this;
            }

            /**
             * Retrieves the URI instance.
             *
             * This method MUST return a UriInterface instance.
             *
             * @link http://tools.ietf.org/html/rfc3986#section-4.3
             * @return UriInterface Returns a UriInterface instance
             *     representing the URI of the request.
             */
            public function getUri() : UriInterface
            {
                // TODO: Implement getUri() method.
            }

            /**
             * Returns an instance with the provided URI.
             *
             * This method MUST update the Host header of the returned request by
             * default if the URI contains a host component. If the URI does not
             * contain a host component, any pre-existing Host header MUST be carried
             * over to the returned request.
             *
             * You can opt-in to preserving the original state of the Host header by
             * setting `$preserveHost` to `true`. When `$preserveHost` is set to
             * `true`, this method interacts with the Host header in the following ways:
             *
             * - If the Host header is missing or empty, and the new URI contains
             *   a host component, this method MUST update the Host header in the returned
             *   request.
             * - If the Host header is missing or empty, and the new URI does not contain a
             *   host component, this method MUST NOT update the Host header in the returned
             *   request.
             * - If a Host header is present and non-empty, this method MUST NOT update
             *   the Host header in the returned request.
             *
             * This method MUST be implemented in such a way as to retain the
             * immutability of the message, and MUST return an instance that has the
             * new UriInterface instance.
             *
             * @link http://tools.ietf.org/html/rfc3986#section-4.3
             * @param UriInterface $uri New request URI to use.
             * @param bool $preserveHost Preserve the original state of the Host header.
             * @return static
             */
            public function withUri(UriInterface $uri, $preserveHost = false) : RequestInterface
            {
                return $this;
            }
        };
    }
}