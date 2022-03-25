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

namespace Core\Http;

if (!defined('ROOT')) {
    exit('access denied');
}

require_once(ROOT . '/core/Traits/Singleton.php');

use Core\Traits\Singletone;

/**
 * Request Class
 * Can be extended
 * @package Core\Http
 * @version 1.0
 */
class Request
{
    use Singletone;

    /** @var bool Is Ajax */
    private bool $ajax;

    /**
     * Private constructor
     */
    private function __construct()
    {
        $this->ajax = $_SERVER['HTTP_X_REQUESTED_WITH'] && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    /**
     * Get input value
     *
     * @param string                     $key - value key
     * @param int|string|bool|array|null $default - default value
     * @return int|string|bool|array|null
     */
    public function get(string $key, $default = null)
    {
        return $_GET[$key] ?? $_POST[$key] ?? $default;
    }

    /**
     * Is Ajax
     *
     * @return bool
     */
    public function isAjax(): bool
    {
        return $this->ajax;
    }
}
