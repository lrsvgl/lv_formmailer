=================
lv_formmailer
=================

What does it do?

* generate the documentation using on-line services (@todo to write) 
* provides an basic order form with
* 3 categories for articles
* from database (title, subtitle, richtext, price, image)
* sends to a receiver and the user

Install

* unzip into TYPO3 /typo3conf/ext/
* install in Extension manager
* include static template
* set storage pid in constants
* go the the storage folder and create a record "Formmailer/Form"
* go some page and insert a frontend plugin "formmailer" and
* chose the form record of your choice
* for using mulitple form records work width conditions in the fluid template, 
* by requesting the form uid (this not tested yet)

Configuration

* set up your fields in the Fluid template /Resources/Forms/Show.html
* there are 3 arrays provided to the controller: 
* $form (the basic form), use keynames as you like (this may be changed in the future)
* $articles (for some order stuff, this is not necessary - used for inqueries), don´t change key names
* $total (if articles have prices, this is not necessary - used for inqueries), don´t change key names

Todo

* implement captcha service
* test multiple forms
* localisation
* BE-Module for - i don´t know what

Target

* provide a basic extension for fast implementing forms
* without configuring fields in IRRE
* only in the fluid template
