<?php
/**
 * NOTICE OF LICENSE
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE
 * WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.
 * IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
 * WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR
 * THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category Lof
 * @package Lof_Google_Recaptcha
 * @author Landofcoder <landofcoder@gmail.com>
 * @copyright Copyright (c) 2020, Landofcoder
 * @license http://opensource.org/licenses/MIT
 */

class Lof_GoogleRecaptcha_Helper_Data extends Mage_Core_Helper_Data
{
    const XML_PATH_SITE_KEY     = 'grecaptcha/keys/site_key';
    const XML_PATH_SECRET_KEY   = 'grecaptcha/keys/secret_key';

    /**
     * Token in JSON
     * @return string
     */
    public function getSecureToken()
    {
        /**
         * A unique string that identifies this request.
         * Every CAPTCHA request needs a distinct session_id.
         */
        $token = array(
            'session_id' => Mage::getSingleton('core/session')->getFormKey(), //maybe use the session_id?
            'ts_ms' => time()
        );

        return json_encode($token);
    }

    /**
     * Encrypted secure token with site secret
     * @return string|false
     */
    public function getEncryptedSecureToken()
    {
        if ($this->getSecureToken()){
            if (Mage::getStoreConfig(self::XML_PATH_SECRET_KEY)) {
                return crypt($this->getSecureToken(), Mage::getStoreConfig(self::XML_PATH_SECRET_KEY));
            }
        }

        return false;
    }

    public function log($message)
    {
        Mage::log($message, 0, 'grecaptcha.log', true);
    }
}
