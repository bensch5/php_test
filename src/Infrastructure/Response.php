<?php

namespace Infrastructure;

class Response
{
    public function __construct(protected string $content = '', protected int $status = 200, protected string $contentType = 'text/html') {}

    public function sendHeaders()
    {
        http_response_code($this->status);
        header(sprintf('Content-Type: %s', $this->contentType));
    }

    public function sendContent()
    {
        echo $this->content;
    }

    public function send()
    {
        $this->sendHeaders();
        $this->sendContent();
    }

    // replace current content
    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    // append to current content
    public function addContent(string $extra): void
    {
        $this->content .= $extra;
    }

    public function setStatus(int $status): void
    {
        $this->status = $status;
    }

    public function setContentType(string $type): void
    {
        $this->contentType = $type;
    }
}
