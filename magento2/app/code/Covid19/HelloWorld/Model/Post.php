<?php
namespace Covid19\HelloWorld\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'covid19_helloworld_post';

	protected $_cacheTag = 'covid19_helloworld_post';

	protected $_eventPrefix = 'covid19_helloworld_post';

	protected function _construct()
	{
		$this->_init('Covid19\HelloWorld\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}