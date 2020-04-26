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
 * @package Lof_GoogleRecaptcha  
 * @author Landofcoder <landofcoder@gmail.com>
 * @copyright Copyright (c) 2020, Landofcoder
 * @license http://opensource.org/licenses/MIT
 */

class Lof_GoogleRecaptcha_Block_Widget extends Mage_Core_Block_Template
{
    public function getKey()
    {
        return Mage::getStoreConfig(Lof_GoogleRecaptcha_Helper_Data::XML_PATH_SITE_KEY);
    }

    public function getSecureToken()
    {
        return Mage::helper('grecaptcha')->getSecureToken();
    }
}
