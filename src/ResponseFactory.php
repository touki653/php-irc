<?php

namespace Touki\IRC;

/**
 * Base factory class for responses
 *
 * @author Touki <g.vincendon@vithemis.com>
 */
class ResponseFactory
{
    /**
     * Builds a response
     *
     * @param string $input Input to parse
     *
     * @return Response
     */
    public function build($input)
    {
        $explode = explode(":", $input);

        if (count($explode) < 2) {
            throw new \UnexpectedValueException(sprintf("Could not parse %s", $input));
        }

        $type = $explode[0];
        $content = implode(":", array_slice($explode, 1));

        if ($type) {
            $response = new IrcResponse;
            $response->setType(trim(strtoupper($type)));
            $response->setContent($content);

            return $response;
        }

        $response = new MessageResponse;
        $parse = explode(" ", $content);

        $response->setFrom($this->parseUser($parse[0]));
        $response->setType(trim(strtoupper($parse[1])));
        $response->setTo($parse[2]);
        $response->setContent(trim(implode(" ", array_slice($parse, 3))));

        return $response;
    }

    private function parseUser($input)
    {
        $user = new User;
        $pattern = "/(?P<nickname>[^!]+)!(?P<ident>[^@]+)@(?P<host>[^\b]*)/";

        if (!preg_match($pattern, $input, $matches)) {
            $user->setNickname($input);

            return $user;
        }

        $user->setNickname($matches['nickname']);
        $user->setIdent($matches['ident']);
        $user->setHost($matches['host']);

        return $user;
    }
}
