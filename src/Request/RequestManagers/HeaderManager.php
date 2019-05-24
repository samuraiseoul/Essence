<?php

namespace Essence\Request\RequestManagers;


use Essence\Utilities\MapManager;

final class HeaderManager extends MapManager
{
    // TODO: Value Type headers.
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers
    // Standard Request Headers http://wikipedia.org/wiki/List_of_HTTP_header_fields
    public const A_IM = 'A-IM';
    public const ACCEPT = 'Accept';
    public const ACCEPT_CHARSET = 'Accept-Charset';
    public const ACCEPT_ENCODING = 'Accept-Encoding';
    public const ACCEPT_LANGUAGE = 'Accept-Language';
    public const ACCEPT_DATETIME = 'Accept-Datetime';
    public const ACCESS_CONTROL_REQUEST_METHOD = 'Access-Control-Request-Method';
    public const ACCESS_CONTROL_REQUEST_HEADERS = 'Access-Control-Request-Headers';
    public const AUTHORIZATION = 'Authorization';
    public const CACHE_CONTROL = 'Cache-Control';
    public const CONNECTION = 'Connection';
    public const CONTENT_LENGTH = 'Content-Length';
    public const CONTENT_MD5 = 'Content-MD5';
    public const CONTENT_TYPE = 'Content-Type';
    public const COOKIE = 'Cookie';
    public const DATE = 'Date';
    public const EXPECT = 'Expect';
    public const FORWARDED = 'Forwarded';
    public const FROM = 'From';
    public const HOST = 'Host';
    public const IF_MATCH = 'If-Match';
    public const IF_MODIFIED_SINCE = 'If-Modified-Since';
    public const IF_NONE_MATCH = 'If-None-Match';
    public const IF_RANGE = 'If-Range';
    public const IF_UNMODIFIED_SINCE = 'If-Unmodified-Since';
    public const MAX_FORWARDS = 'Max-Forwards';
    public const ORIGIN = 'Origin';
    public const PRAGMA = 'Pragma';
    public const PROXY_AUTHORIZATION = 'Proxy-Authorization';
    public const RANGE = ' Range';
    public const REFERER = 'Referer';
    public const TE = 'TE';
    public const USER_AGENT = 'User-Agent';
    public const UPGRADE = 'Upgrade';
    public const VIA = 'Via';
    public const WARNING = 'Warning';

    //Non Standard Request Headers
    public const UPGRADE_INSECURE_REQUESTS = 'Upgrade-Insecure-Requests';
    public const X_REQUESTED_WITH = 'X-Requested-With';
    public const DNT = 'DNT';
    public const X_FORWARDED_FOR = 'X-Forwarded-For';
    public const X_FORWARDED_HOST = 'X-Forwarded-Host';
    public const X_FORWARDED_PROTO = 'X-Forwarded-Proto';
    public const FRONT_END_HTTPS = 'Front-End-Https';
    public const X_HTTP_METHOD_OVERRIDE = 'X-Http-Method-Override';
    public const X_ATT_DEVICEID = 'X-ATT-DeviceId';
    public const X_WAP_PROFILE = 'X-Wap-Profile';
    public const PROXY_CONNECTION = 'Proxy-Connection';
    public const X_UIDH = 'X-UIDH';
    public const X_CSRF_TOKEN = 'X-Csrf-Token';
    public const X_REQUEST_ID = 'X-Request-ID';
    public const X_CORRELATION_ID = 'X-Correlation-ID';
    public const SAVE_DATA = 'Save-Data ';

    protected function prepareMapFunction(): array
    {
        return apache_request_headers();
    }
}