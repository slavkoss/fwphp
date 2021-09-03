"B12phpfw" image gallery Intro (Home)
-------------------------------------

[![/vendor/b12phpfw/img/mvc_M_V_and_M_C_V_data_flow.jpg](../../../vendor/b12phpfw/img/mvc_M_V_and_M_C_V_data_flow.jpg)](../../../vendor/b12phpfw/img/mvc_M_V_and_M_C_V_data_flow.jpg)

[](some_html)MVC : M\_V and M\_C\_V data flow

[![/vendor/b12phpfw/img/mvc_M_V_data_flow.jpg](../../../vendor/b12phpfw/img/mvc_M_V_data_flow.jpg)](../../../vendor/b12phpfw/img/mvc_M_V_data_flow.jpg)

[](some_html)M\_V data flow

[![/vendor/b12phpfw/img/mvc_M_C_V_data_flow_Laravel.jpg](../../../vendor/b12phpfw/img/mvc_M_C_V_data_flow_Laravel.jpg)](../../../vendor/b12phpfw/img/mvc_M_C_V_data_flow_Laravel.jpg)

[](some_html)M\_C\_V data flow (Laravel)

[![/vendor/b12phpfw/img/mvc_M_C_V.jpg](../../../vendor/b12phpfw/img/mvc_M_C_V.jpg)](../../../vendor/b12phpfw/img/mvc_M_C_V.jpg)

[](some_html)Code separation

[![/vendor/b12phpfw/img/mvc_M_V_data_flow_MVC_3tier_DAO_abstract_interface.jpg](../../../vendor/b12phpfw/img/mvc_M_V_data_flow_MVC_3tier_DAO_abstract_interface.jpg)](../../../vendor/b12phpfw/img/mvc_M_V_data_flow_MVC_3tier_DAO_abstract_interface.jpg)

[](some_html)M\_V data flow : MVC 3tier Code separation

[![/vendor/b12phpfw/img/meatmirror.jpg](../../../vendor/b12phpfw/img/meatmirror.jpg)](../../../vendor/b12phpfw/img/meatmirror.jpg)

[](some_html)Selfknowing, moderate, no delusion (false opinion)

Code separation
---------------

DAO tier is Data Access Object abstract interface. In B12phpfw code skeleton Model and DAO tiers are in :

1.  view scripts are Model (Bussiness) tier - they call Tbl\_crud method like in Oracle Forms.  
    **View scripts do not know how DAO makes CRUD !**
2.  Tbl\_crud.php (code not visible in in Oracle Forms)  is Model (Bussiness) tier and partially DAO tier - knows what module does
3.  Db\_allsites.php (code not visible in in Oracle Forms) is DAO tier - **does not know what module does**

In B12phpfw code skeleton i use M\_V data flow for read, but it is easy (but in my opinion not appropriate) to use M\_C\_V data flow for read - in Home\_ctr.php we examine user entered URL (request) and call method which can read data (or do any CRUD operation - procedure on data).

Selfknowing, moderate, no delusion (false opinion)
--------------------------------------------------

Ancient Greek maxim (aphorism) "know thyself" (Greek: γνῶθι σεαυτόν, latin "nosce te ipsum") is one of the Delphic maxims and was the first of three maxims inscribed in the pronaos (forecourt) of the Temple of Apollo at Delphi according to the Greek writer Pausanias.

The two maxims that followed are :

1.  "**know thyself**" were
2.  "**nothing to excess (overmuch) - be moderate**" and
3.  "**surety (security) brings ruin**" - Diogenes Laertius in his Life of Pyrrho saw in it an expression of Greek philosophical skepticism, in other words, "Beware of committing yourself to false opinion" or "Beware false certainty (blunder, deceit, **delusion**)." Delphic oracle named Socrates the wisest of men. Socrates insisted that if he was wise, it was only because he **recognized his own ignorance**. In the **Platonic dialogues**, Socrates continually sought to expose the **perils** (odgovornost, opasnost, propast, rizik, zagroziti) **of false opinion**, seeing it as one of the fundamental problems of human nature and society.

[https://en.wikipedia.org/wiki/Know\_thyself](https://en.wikipedia.org/wiki/Know_thyself)    [https://www.john-uebersax.com/delphi/delphi.htm](https://www.john-uebersax.com/delphi/delphi.htm)    [https://www.wikiwand.com/en/Delphic\_maxims](https://www.wikiwand.com/en/Delphic_maxims)    [https://www.mimamsadiary.com/the-great-wisdom-from-ancient-greece/](https://www.mimamsadiary.com/the-great-wisdom-from-ancient-greece/)

Script opening methods
----------------------

 <a target="\_blank" href="../../../vendor/b12phpfw/img/meatmirror.jpg    <img src="../../../vendor/b12phpfw/img/meatmirror.jpg" 
 a         alt="/vendor/b12phpfw/img/meatmirror.jpg" >
 </a>

In code above href="/vendor/b12phpfw/img/meatmirror.jpg" does work in PHP and in HTML called with URL eg  
            http://dev1:8083/fwphp/glomodul/img\_gallery/index.html   
, but href="/vendor/b12phpfw/img/meatmirror.jpg" does not work in double clicked HTML meaning browser does not know where is web server document root !

href="../../../vendor/b12phpfw/img/meatmirror.jpg works for both script opening methods if we do not change folder structure - which we do not - no need. href="/vendor/b12phpfw/img/meatmirror.jpg" is alike sensitive to folder structure.

* * *

This example [Tryit Editor v3.6 (w3schools.com)](https://www.w3schools.com/Css/tryit.asp?filename=trycss_image_gallery_responsive) use media queries to re-arrange the images on different screen sizes: for screens larger than 700px wide, it will show four images side by side, for screens smaller than 700px, it will show two images side by side. For screens smaller than 500px, the images will stack vertically (100%). You will learn more about media queries and responsive web design later in our CSS Tutorial. See also [How To Create a Slideshow (w3schools.com)](https://www.w3schools.com/howto/howto_js_slideshow_gallery.asp) .