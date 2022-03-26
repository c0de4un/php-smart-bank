<?php

/**
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS ``AS
 * IS'' AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO,
 * THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR
 * PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL COPYRIGHT HOLDERS OR CONTRIBUTORS
 * BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
**/

namespace Core\Console;

use Core\Traits\Singletone;

/**
 * Request Class
 *
 * @pacakge Core\Console
 * @version 1.0
 */
class Request implements IConsoleRequest
{
    use Singletone;

    /** @var string Controller name */
    private string $controller;

    /** @var string Controller method name */
    private string $method;

    /** @var array<string,string> Arguments */
    private array $args = [];

    /**
     * Private constructor
     */
    private function __construct()
    {
        global $argv;

        $this->controller = $argv[1];
        $this->method = str_replace('-', '', $argv[2]);

        $args = array_slice($argv, 3);
        foreach ($args as $arg) {
            $arg = str_replace('-', '', $arg);
            $parts = explode('=', $arg);
            $this->args[$parts[0]] = $parts[1] ?? '';
        }
    }

    public function getController(): string
    {
        return $this->controller;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function get(string $key, $default = null)
    {
        return $this->args[$key] ?? $default;
    }
}
