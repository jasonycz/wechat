<?php

namespace Overtrue\Wechat\Messages;

use Overtrue\Wechat\Utils\XML;

/**
 * @property string $content
 */
class Text extends AbstractMessage
{

    protected $properties = array('content');

    public function formatToClient()
    {
        return array(
                'touser'  => $this->to,
                'msgtype' => 'text',
                'text'    => array(
                              'content' => $this->content,
                             ),
        );
    }

    public function formatToServer()
    {
        $response = array(
                     'ToUserName'   => $this->to,
                     'FromUserName' => $this->from,
                     'CreateTime'   => time(),
                     'MsgType'      => 'text',
                     'Content'      => $this->content,
                    );

        return XML::build($response);
    }

}