<?php

class Message
{
    protected $type;
    protected $content;
    protected $extra;

    public function __construct($type, $content = null, $extra = null)
    {
        $this->type = $type;
        $this->content = $content;
        $this->extra = $extra;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function getExtra()
    {
        return $this->extra;
    }
}

$socket = fsockopen('irc.onlinegamesnet.net', 6667);
stream_set_blocking($socket, 0);
fputs($socket, "USER ToukiBot ToukiBot ToukiBot ToukiBot\r\n");
fputs($socket, "NICK ToukiBot\r\n");

$buffer = null;

while (true) {
    $datas = fgets($socket);

    if (false === $datas) {
        continue;
    }

    var_dump($datas);

    usleep(100);
}
