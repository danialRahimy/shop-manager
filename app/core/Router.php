<?php


class Router
{
    private $matchRoute = array();
    private $routes = array();
    private $requestUri;

    public function __construct($routes)
    {
        $this->requestUri = $_SERVER["REQUEST_URI"];
        $this->routes = $routes;
        $parts = $this->getParts($this->requestUri);
        $this->findMatch($this->routes, $parts, 0);
    }

    protected function findMatch($routes, $parts, $level)
    {
        $needToMatch = $routes;

        if (count($parts) < 1 and $this->isHome($this->routes)) {
            $part = "";
        } else {
            $part = $parts[$level];
        }

        foreach ($needToMatch as $key => $value) {
            $routesParts = explode("/", $value[0]);

            if (array_key_exists($level, $routesParts)) {
                if ($routesParts[$level] != $part and !$this->isParam($routesParts[$level])) {
                    unset($needToMatch[$key]);
                }
            } else {
                unset($needToMatch[$key]);
            }
        }

        $nextLevel = $level;
        $nextLevel = $nextLevel + 1;

        if (array_key_exists($nextLevel, $parts)) {
            $this->findMatch($needToMatch, $parts, $nextLevel);
        } else {

            if (count($needToMatch) > 0) {
                foreach ($needToMatch as $key => $value) {
                    if ($this->countRoutePart($value[0]) !== count($parts)) {
                        unset($needToMatch[$key]);
                        continue;
                    } else {
                        $needToMatch = $value;
                        break;
                    }
                }

                if (count($parts) === $this->countRoutePart($needToMatch[0])) {
                    $this->matchRoute = $needToMatch;
                    (new DispatcherManual($this->matchRoute));
                } else {
                    echo "Doesn't Find Match Route In Route List<br>";
                    $this->pageNotFound();
                }

            } else {
                echo "Doesn't Find Match Route In Route List<br>";
                $this->pageNotFound();
            }
        }
    }

    protected function isParam($value)
    {
        $posStart = strpos($value, "{");
        $posEnd = strpos($value, "}");

        if ($posEnd !== false and $posStart !== false) {
            return array($posStart, $posEnd);
        }

        return false;
    }

    protected function isHome($routes)
    {
        $valid = false;

        foreach ($routes as $key => $value) {
            if ($value[0] === "/") {
                $this->routes = $routes[$key];
                $valid = true;
                break;
            }
        }

        return $valid;
    }

    protected function countRoutePart($value)
    {
        $parts = explode("/", $value);

        if (count($parts) > 0) {
            foreach ($parts as $key => $value) {
                if (empty($value)) {
                    unset($parts[$key]);
                }
            }
        }

        return count($parts);
    }

    protected function pageNotFound()
    {
        (new ErrorController("error","notFound"))->notFoundAction();
    }

    protected function getParts($uri = "")
    {
        $parts = explode("/", $uri);
        $outPut = array();

        foreach ($parts as $part) {
            if (!empty($part)) {
                $outPut[] = $part;
            }
        }

        return $outPut;
    }
}