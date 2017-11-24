<?php
namespace Loevgaard\DandomainImportExport\Xml;

use Loevgaard\DandomainImportExport\Xml\Category\ParentCategory;

class Category extends Element
{
    /**
     * This is the category number within the Dandomain interface
     *
     * @var int
     */
    protected $id;

    /** @var int */
    protected $languageId;

    /** @var string */
    protected $name;

    /** @var bool */
    protected $hidden;

    /** @var int */
    protected $sort;

    /** @var string */
    protected $link;

    /** @var string */
    protected $description;

    /** @var string */
    protected $icon;

    /** @var string */
    protected $subCategorySymbol;

    /** @var string */
    protected $image;

    /** @var string */
    protected $metaKeywords;

    /** @var string */
    protected $metaDescription;

    /** @var string */
    protected $title;

    /** @var int */
    protected $internalId;

    /** @var string */
    protected $uniqueUrlName;

    /** @var ParentCategory[] */
    protected $parentCategories;

    /** @var string */
    protected $directLink;

    public function __construct($id, $languageId, $parentCategories, $name = null, $hidden = null, $sort = null, $link = null, $description = null, $icon = null, $subCategorySymbol = null, $image = null, $metaKeywords = null, $metaDescription = null, $title = null, $internalId = null, $uniqueUrlName = null, $directLink = null)
    {
        $this->id                   = $id;
        $this->languageId           = $languageId;
        $this->name                 = $name;
        $this->hidden               = $hidden;
        $this->sort                 = $sort;
        $this->link                 = $link;
        $this->description          = $description;
        $this->icon                 = $icon;
        $this->subCategorySymbol    = $subCategorySymbol;
        $this->image                = $image;
        $this->metaKeywords         = $metaKeywords;
        $this->metaDescription      = $metaDescription;
        $this->title                = $title;
        $this->internalId           = $internalId;
        $this->uniqueUrlName        = $uniqueUrlName;
        $this->parentCategories     = $parentCategories;
        $this->directLink           = $directLink;
    }

    public function getXml() : string
    {
        $xml = '<PRODUCT_CATEGORY>';
        $xml .= '<PROD_CAT_ID>' . $this->id . '</PROD_CAT_ID>';
        $xml .= '<LANGUAGE_ID>' . $this->languageId . '</LANGUAGE_ID>';
        if ($this->name) {
            $xml .= '<PROD_CAT_NAME>' . $this->name . '</PROD_CAT_NAME>';
        }
        $xml .= '<PROD_CAT_HIDDEN>' . ($this->hidden ? 'True' : 'False') . '</PROD_CAT_HIDDEN>';
        if ($this->sort) {
            $xml .= '<PROD_CAT_SORT>' . $this->sort . '</PROD_CAT_SORT>';
        }
        if ($this->link) {
            $xml .= '<PROD_CAT_LINK>' . $this->link . '</PROD_CAT_LINK>';
        }
        if ($this->description) {
            $xml .= '<PROD_CAT_DESCRIPTION><![CDATA[' . $this->description . ']]></PROD_CAT_DESCRIPTION>';
        }
        if ($this->icon) {
            $xml .= '<PROD_CAT_ICON>' . $this->icon . '</PROD_CAT_ICON>';
        }
        $xml .= '<SUBCAT_SYMBOL>' . ($this->subCategorySymbol ? $this->subCategorySymbol : '') . '</SUBCAT_SYMBOL>';
        if ($this->image) {
            $xml .= '<PROD_CAT_IMAGE>' . $this->image . '</PROD_CAT_IMAGE>';
        }
        if ($this->metaKeywords) {
            $xml .= '<META_KEYWORDS>' . $this->metaKeywords . '</META_KEYWORDS>';
        }
        if ($this->metaDescription) {
            $xml .= '<META_DESCRIPTION>' . $this->metaDescription . '</META_DESCRIPTION>';
        }
        if ($this->title) {
            $xml .= '<TITLE>' . $this->title . '</TITLE>';
        }
        if ($this->internalId) {
            $xml .= '<INTERNAL_ID>' . $this->internalId . '</INTERNAL_ID>';
        }
        if ($this->uniqueUrlName) {
            $xml .= '<PROD_CAT_UNIQUE_URL_NAME>' . $this->uniqueUrlName . '</PROD_CAT_UNIQUE_URL_NAME>';
        }
        if ($this->directLink) {
            $xml .= '<DIRECT_LINK>' . $this->directLink . '</DIRECT_LINK>';
        }
        $xml .= '<PARENT_CATEGORIES>';
        foreach ($this->parentCategories as $parentCategory) {
            $xml .= $parentCategory->getXml();
        }
        $xml .= '</PARENT_CATEGORIES>';
        $xml .= '</PRODUCT_CATEGORY>';
        return $xml;
    }
}
