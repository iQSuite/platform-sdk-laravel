<?php

namespace IQSuite\Platform;

class MimeType
{
    public static function getMimeType(string $filename): string
    {
        return mime_content_type($filename) ?: 'application/octet-stream';
    }
}