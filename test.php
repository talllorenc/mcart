<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новая страница");
?><?$APPLICATION->IncludeComponent(
	"bitrix:menu",
	"top_multi",
	Array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(""),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "site",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N"
	)
);?><?$APPLICATION->IncludeComponent(
	"bitrix:news.line",
	"slider",
	Array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "300",
		"CACHE_TYPE" => "A",
		"DETAIL_URL" => "",
		"FIELD_CODE" => array("PREVIEW_PICTURE",""),
		"IBLOCKS" => array("12"),
		"IBLOCK_TYPE" => "Content",
		"NEWS_COUNT" => "20",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC"
	)
);?><?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "nav", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>



<div class="site-navbar">
  <div class="container py-1">
    <div class="row align-items-center">
      <div class="col-8 col-md-8 col-lg-4">
        <h1 class=""><a href="index.html" class="h5 text-uppercase text-black"><strong>HomeSpace<span class="text-danger">.</span></strong></a></h1>
      </div>
      <div class="col-4 col-md-4 col-lg-8">
        <nav class="site-navigation text-right text-md-right" role="navigation">

          <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          <?if (!empty($arResult)):?>
          <ul class="site-menu js-clone-nav d-none d-lg-block">
            <?
            $previousLevel = 0;
            foreach($arResult as $arItem):
              if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
                <?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
              <?endif?>

              <?if ($arItem["IS_PARENT"]):?>
                <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                  <li class="<?if ($arItem["SELECTED"]):?>active<?endif?>">
                    <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                  <?else:?>
                  <li class="has-children <?if ($arItem["SELECTED"]):?>active<?endif?>">
                    <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                    <ul class="dropdown">
                <?endif?>
              <?else:?>
                <?if ($arItem["DEPTH_LEVEL"] == 1):?>
                  <li class="<?if ($arItem["SELECTED"]):?>active<?endif?>">
                    <a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a>
                  </li>
                <?else:?>
                  <li class="<?if ($arItem["SELECTED"]):?>active<?endif?>"><a href="<?=$arItem["LINK"]?>"><?=$arItem["TEXT"]?></a></li>
                <?endif?>
              <?endif?>

              <?$previousLevel = $arItem["DEPTH_LEVEL"];?>
            <?endforeach?>

            <?if ($previousLevel > 1)://close last item tags?>
              <?=str_repeat("</ul></li>", ($previousLevel-1) );?>
            <?endif?>
          </ul>
          <?endif?>
        </nav>
      </div>
    </div>
  </div>
</div>
