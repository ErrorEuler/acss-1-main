
```
acss-1-main
├─ .env
├─ composer.json
├─ composer.lock
├─ package-lock.json
├─ package.json
├─ public
│  ├─ assets
│  │  ├─ js
│  │  │  ├─ curriculum.js
│  │  │  └─ schedule.js
│  │  └─ logo
│  │     └─ main_logo
│  │        ├─ campus.jpg
│  │        └─ PRMSUlogo.png
│  ├─ css
│  │  ├─ custom.css
│  │  └─ output.css
│  ├─ index.php
│  └─ uploads
│     ├─ profiles
│     │  ├─ profile_1_1755697812.png
│     │  ├─ profile_1_1755697860.png
│     │  └─ profile_1_1755860919.png
│     ├─ profiles_picture
│     │  └─ profile_1_1755864417.png
│     └─ profile_pictures
│        ├─ profile_1_1755864533.png
│        ├─ profile_1_1755867785.png
│        ├─ profile_2_1755869397.png
│        ├─ profile_65_1755868685.png
│        ├─ user_1_1755864800.png
│        ├─ user_1_1755865986.png
│        ├─ user_49_1751092559.png
│        ├─ user_59_1755334211.png
│        ├─ user_59_1755334397.png
│        ├─ user_59_1755334635.png
│        ├─ user_59_1755335026.png
│        ├─ user_59_1755335130.png
│        └─ user_59_1755335861.png
├─ src
│  ├─ api
│  │  └─ load_data.php
│  ├─ assets
│  │  ├─ CustomCss
│  │  │  └─ layout.css
│  │  └─ js
│  │     └─ curriculum.js
│  ├─ config
│  │  └─ Database.php
│  ├─ controllers
│  │  ├─ AdminController.php
│  │  ├─ ApiController.php
│  │  ├─ AuthController.php
│  │  ├─ ChairController.php
│  │  ├─ DeanController.php
│  │  ├─ DirectorController.php
│  │  ├─ FacultyController.php
│  │  └─ PublicController.php
│  ├─ input.css
│  ├─ middleware
│  │  └─ AuthMiddleware.php
│  ├─ models
│  │  ├─ ContentModel.php
│  │  ├─ ScheduleModel.php
│  │  └─ UserModel.php
│  ├─ services
│  │  ├─ AuthService.php
│  │  ├─ EmailService.php
│  │  └─ SchedulingService.php
│  └─ views
│     ├─ admin
│     │  ├─ act_logs.php
│     │  ├─ colleges.php
│     │  ├─ colleges_departments.php
│     │  ├─ dashboard.php
│     │  ├─ departments.php
│     │  ├─ layout.php
│     │  ├─ profile.php
│     │  ├─ settings.php
│     │  └─ users.php
│     ├─ auth
│     │  ├─ login.php
│     │  └─ register.php
│     ├─ chair
│     │  ├─ classroom.php
│     │  ├─ courses.php
│     │  ├─ curriculum.php
│     │  ├─ dashboard.php
│     │  ├─ faculty.php
│     │  ├─ layout.php
│     │  ├─ my_schedule.php
│     │  ├─ profile.php
│     │  ├─ schedule_management.php
│     │  └─ sections.php
│     ├─ dean
│     │  ├─ classroom.php
│     │  ├─ courses.php
│     │  ├─ curriculum.php
│     │  ├─ dashboard.php
│     │  ├─ faculty.php
│     │  ├─ layout.php
│     │  ├─ profile.php
│     │  ├─ schedule.php
│     │  ├─ search.php
│     │  └─ settings.php
│     ├─ director
│     │  ├─ dashboard.php
│     │  ├─ layout.php
│     │  ├─ monitor.php
│     │  ├─ profile.php
│     │  └─ schedule_deadline.php
│     ├─ errors
│     │  └─ 403.php
│     ├─ faculty
│     │  ├─ dashboard.php
│     │  ├─ layout.php
│     │  ├─ my_schedule.php
│     │  └─ profile.php
│     ├─ partials
│     │  ├─ chair
│     │  │  └─ sidebar.php
│     │  └─ css
│     │     └─ custome.css
│     ├─ public
│     │  └─ home.php
│     └─ uploads
│        └─ profiles
│           ├─ profile_8001_1746259354.jpg
│           ├─ profile_8001_1746259382.jpg
│           ├─ profile_8002_1746259410.jpg
│           └─ profile_8003_1746259638.jpg
├─ tailwind.config.js
├─ test_db.php
└─ vendor
   ├─ autoload.php
   ├─ composer
   │  ├─ autoload_classmap.php
   │  ├─ autoload_files.php
   │  ├─ autoload_namespaces.php
   │  ├─ autoload_psr4.php
   │  ├─ autoload_real.php
   │  ├─ autoload_static.php
   │  ├─ ClassLoader.php
   │  ├─ installed.json
   │  ├─ installed.php
   │  ├─ InstalledVersions.php
   │  ├─ LICENSE
   │  ├─ pcre
   │  │  ├─ composer.json
   │  │  ├─ extension.neon
   │  │  ├─ LICENSE
   │  │  ├─ README.md
   │  │  └─ src
   │  │     ├─ MatchAllResult.php
   │  │     ├─ MatchAllStrictGroupsResult.php
   │  │     ├─ MatchAllWithOffsetsResult.php
   │  │     ├─ MatchResult.php
   │  │     ├─ MatchStrictGroupsResult.php
   │  │     ├─ MatchWithOffsetsResult.php
   │  │     ├─ PcreException.php
   │  │     ├─ PHPStan
   │  │     │  ├─ InvalidRegexPatternRule.php
   │  │     │  ├─ PregMatchFlags.php
   │  │     │  ├─ PregMatchParameterOutTypeExtension.php
   │  │     │  ├─ PregMatchTypeSpecifyingExtension.php
   │  │     │  ├─ PregReplaceCallbackClosureTypeExtension.php
   │  │     │  └─ UnsafeStrictGroupsCallRule.php
   │  │     ├─ Preg.php
   │  │     ├─ Regex.php
   │  │     ├─ ReplaceResult.php
   │  │     └─ UnexpectedNullMatchException.php
   │  └─ platform_check.php
   ├─ graham-campbell
   │  └─ result-type
   │     ├─ composer.json
   │     ├─ LICENSE
   │     └─ src
   │        ├─ Error.php
   │        ├─ Result.php
   │        └─ Success.php
   ├─ maennchen
   │  └─ zipstream-php
   │     ├─ .editorconfig
   │     ├─ .phive
   │     │  └─ phars.xml
   │     ├─ .php-cs-fixer.dist.php
   │     ├─ .phpdoc
   │     │  └─ template
   │     │     └─ base.html.twig
   │     ├─ .tool-versions
   │     ├─ composer.json
   │     ├─ guides
   │     │  ├─ ContentLength.rst
   │     │  ├─ FlySystem.rst
   │     │  ├─ index.rst
   │     │  ├─ Nginx.rst
   │     │  ├─ Options.rst
   │     │  ├─ PSR7Streams.rst
   │     │  ├─ StreamOutput.rst
   │     │  ├─ Symfony.rst
   │     │  └─ Varnish.rst
   │     ├─ LICENSE
   │     ├─ phpdoc.dist.xml
   │     ├─ phpunit.xml.dist
   │     ├─ psalm.xml
   │     ├─ README.md
   │     ├─ src
   │     │  ├─ CentralDirectoryFileHeader.php
   │     │  ├─ CompressionMethod.php
   │     │  ├─ DataDescriptor.php
   │     │  ├─ EndOfCentralDirectory.php
   │     │  ├─ Exception
   │     │  │  ├─ DosTimeOverflowException.php
   │     │  │  ├─ FileNotFoundException.php
   │     │  │  ├─ FileNotReadableException.php
   │     │  │  ├─ FileSizeIncorrectException.php
   │     │  │  ├─ OverflowException.php
   │     │  │  ├─ ResourceActionException.php
   │     │  │  ├─ SimulationFileUnknownException.php
   │     │  │  ├─ StreamNotReadableException.php
   │     │  │  └─ StreamNotSeekableException.php
   │     │  ├─ Exception.php
   │     │  ├─ File.php
   │     │  ├─ GeneralPurposeBitFlag.php
   │     │  ├─ LocalFileHeader.php
   │     │  ├─ OperationMode.php
   │     │  ├─ PackField.php
   │     │  ├─ Time.php
   │     │  ├─ Version.php
   │     │  ├─ Zip64
   │     │  │  ├─ DataDescriptor.php
   │     │  │  ├─ EndOfCentralDirectory.php
   │     │  │  ├─ EndOfCentralDirectoryLocator.php
   │     │  │  └─ ExtendedInformationExtraField.php
   │     │  ├─ ZipStream.php
   │     │  └─ Zs
   │     │     └─ ExtendedInformationExtraField.php
   │     └─ test
   │        ├─ Assertions.php
   │        ├─ bootstrap.php
   │        ├─ CentralDirectoryFileHeaderTest.php
   │        ├─ DataDescriptorTest.php
   │        ├─ EndlessCycleStream.php
   │        ├─ EndOfCentralDirectoryTest.php
   │        ├─ FaultInjectionResource.php
   │        ├─ LocalFileHeaderTest.php
   │        ├─ PackFieldTest.php
   │        ├─ ResourceStream.php
   │        ├─ Tempfile.php
   │        ├─ TimeTest.php
   │        ├─ Util.php
   │        ├─ Zip64
   │        │  ├─ DataDescriptorTest.php
   │        │  ├─ EndOfCentralDirectoryLocatorTest.php
   │        │  ├─ EndOfCentralDirectoryTest.php
   │        │  └─ ExtendedInformationExtraFieldTest.php
   │        ├─ ZipStreamTest.php
   │        └─ Zs
   │           └─ ExtendedInformationExtraFieldTest.php
   ├─ markbaker
   │  ├─ complex
   │  │  ├─ classes
   │  │  │  └─ src
   │  │  │     ├─ Complex.php
   │  │  │     ├─ Exception.php
   │  │  │     ├─ Functions.php
   │  │  │     └─ Operations.php
   │  │  ├─ composer.json
   │  │  ├─ examples
   │  │  │  ├─ complexTest.php
   │  │  │  ├─ testFunctions.php
   │  │  │  └─ testOperations.php
   │  │  ├─ license.md
   │  │  └─ README.md
   │  └─ matrix
   │     ├─ buildPhar.php
   │     ├─ classes
   │     │  └─ src
   │     │     ├─ Builder.php
   │     │     ├─ Decomposition
   │     │     │  ├─ Decomposition.php
   │     │     │  ├─ LU.php
   │     │     │  └─ QR.php
   │     │     ├─ Div0Exception.php
   │     │     ├─ Exception.php
   │     │     ├─ Functions.php
   │     │     ├─ Matrix.php
   │     │     ├─ Operations.php
   │     │     └─ Operators
   │     │        ├─ Addition.php
   │     │        ├─ DirectSum.php
   │     │        ├─ Division.php
   │     │        ├─ Multiplication.php
   │     │        ├─ Operator.php
   │     │        └─ Subtraction.php
   │     ├─ composer.json
   │     ├─ examples
   │     │  └─ test.php
   │     ├─ infection.json.dist
   │     ├─ license.md
   │     ├─ phpstan.neon
   │     └─ README.md
   ├─ phpmailer
   │  └─ phpmailer
   │     ├─ COMMITMENT
   │     ├─ composer.json
   │     ├─ get_oauth_token.php
   │     ├─ language
   │     │  ├─ phpmailer.lang-af.php
   │     │  ├─ phpmailer.lang-ar.php
   │     │  ├─ phpmailer.lang-as.php
   │     │  ├─ phpmailer.lang-az.php
   │     │  ├─ phpmailer.lang-ba.php
   │     │  ├─ phpmailer.lang-be.php
   │     │  ├─ phpmailer.lang-bg.php
   │     │  ├─ phpmailer.lang-bn.php
   │     │  ├─ phpmailer.lang-ca.php
   │     │  ├─ phpmailer.lang-cs.php
   │     │  ├─ phpmailer.lang-da.php
   │     │  ├─ phpmailer.lang-de.php
   │     │  ├─ phpmailer.lang-el.php
   │     │  ├─ phpmailer.lang-eo.php
   │     │  ├─ phpmailer.lang-es.php
   │     │  ├─ phpmailer.lang-et.php
   │     │  ├─ phpmailer.lang-fa.php
   │     │  ├─ phpmailer.lang-fi.php
   │     │  ├─ phpmailer.lang-fo.php
   │     │  ├─ phpmailer.lang-fr.php
   │     │  ├─ phpmailer.lang-gl.php
   │     │  ├─ phpmailer.lang-he.php
   │     │  ├─ phpmailer.lang-hi.php
   │     │  ├─ phpmailer.lang-hr.php
   │     │  ├─ phpmailer.lang-hu.php
   │     │  ├─ phpmailer.lang-hy.php
   │     │  ├─ phpmailer.lang-id.php
   │     │  ├─ phpmailer.lang-it.php
   │     │  ├─ phpmailer.lang-ja.php
   │     │  ├─ phpmailer.lang-ka.php
   │     │  ├─ phpmailer.lang-ko.php
   │     │  ├─ phpmailer.lang-ku.php
   │     │  ├─ phpmailer.lang-lt.php
   │     │  ├─ phpmailer.lang-lv.php
   │     │  ├─ phpmailer.lang-mg.php
   │     │  ├─ phpmailer.lang-mn.php
   │     │  ├─ phpmailer.lang-ms.php
   │     │  ├─ phpmailer.lang-nb.php
   │     │  ├─ phpmailer.lang-nl.php
   │     │  ├─ phpmailer.lang-pl.php
   │     │  ├─ phpmailer.lang-pt.php
   │     │  ├─ phpmailer.lang-pt_br.php
   │     │  ├─ phpmailer.lang-ro.php
   │     │  ├─ phpmailer.lang-ru.php
   │     │  ├─ phpmailer.lang-si.php
   │     │  ├─ phpmailer.lang-sk.php
   │     │  ├─ phpmailer.lang-sl.php
   │     │  ├─ phpmailer.lang-sr.php
   │     │  ├─ phpmailer.lang-sr_latn.php
   │     │  ├─ phpmailer.lang-sv.php
   │     │  ├─ phpmailer.lang-tl.php
   │     │  ├─ phpmailer.lang-tr.php
   │     │  ├─ phpmailer.lang-uk.php
   │     │  ├─ phpmailer.lang-ur.php
   │     │  ├─ phpmailer.lang-vi.php
   │     │  ├─ phpmailer.lang-zh.php
   │     │  └─ phpmailer.lang-zh_cn.php
   │     ├─ LICENSE
   │     ├─ README.md
   │     ├─ SECURITY.md
   │     ├─ SMTPUTF8.md
   │     ├─ src
   │     │  ├─ DSNConfigurator.php
   │     │  ├─ Exception.php
   │     │  ├─ OAuth.php
   │     │  ├─ OAuthTokenProvider.php
   │     │  ├─ PHPMailer.php
   │     │  ├─ POP3.php
   │     │  └─ SMTP.php
   │     └─ VERSION
   ├─ phpoffice
   │  └─ phpspreadsheet
   │     ├─ CHANGELOG.md
   │     ├─ composer.json
   │     ├─ CONTRIBUTING.md
   │     ├─ LICENSE
   │     ├─ README.md
   │     └─ src
   │        └─ PhpSpreadsheet
   │           ├─ Calculation
   │           │  ├─ ArrayEnabled.php
   │           │  ├─ BinaryComparison.php
   │           │  ├─ Calculation.php
   │           │  ├─ CalculationBase.php
   │           │  ├─ CalculationLocale.php
   │           │  ├─ Category.php
   │           │  ├─ Database
   │           │  │  ├─ DatabaseAbstract.php
   │           │  │  ├─ DAverage.php
   │           │  │  ├─ DCount.php
   │           │  │  ├─ DCountA.php
   │           │  │  ├─ DGet.php
   │           │  │  ├─ DMax.php
   │           │  │  ├─ DMin.php
   │           │  │  ├─ DProduct.php
   │           │  │  ├─ DStDev.php
   │           │  │  ├─ DStDevP.php
   │           │  │  ├─ DSum.php
   │           │  │  ├─ DVar.php
   │           │  │  └─ DVarP.php
   │           │  ├─ DateTimeExcel
   │           │  │  ├─ Constants.php
   │           │  │  ├─ Current.php
   │           │  │  ├─ Date.php
   │           │  │  ├─ DateParts.php
   │           │  │  ├─ DateValue.php
   │           │  │  ├─ Days.php
   │           │  │  ├─ Days360.php
   │           │  │  ├─ Difference.php
   │           │  │  ├─ Helpers.php
   │           │  │  ├─ Month.php
   │           │  │  ├─ NetworkDays.php
   │           │  │  ├─ Time.php
   │           │  │  ├─ TimeParts.php
   │           │  │  ├─ TimeValue.php
   │           │  │  ├─ Week.php
   │           │  │  ├─ WorkDay.php
   │           │  │  └─ YearFrac.php
   │           │  ├─ Engine
   │           │  │  ├─ ArrayArgumentHelper.php
   │           │  │  ├─ ArrayArgumentProcessor.php
   │           │  │  ├─ BranchPruner.php
   │           │  │  ├─ CyclicReferenceStack.php
   │           │  │  ├─ FormattedNumber.php
   │           │  │  ├─ Logger.php
   │           │  │  └─ Operands
   │           │  │     ├─ Operand.php
   │           │  │     └─ StructuredReference.php
   │           │  ├─ Engineering
   │           │  │  ├─ BesselI.php
   │           │  │  ├─ BesselJ.php
   │           │  │  ├─ BesselK.php
   │           │  │  ├─ BesselY.php
   │           │  │  ├─ BitWise.php
   │           │  │  ├─ Compare.php
   │           │  │  ├─ Complex.php
   │           │  │  ├─ ComplexFunctions.php
   │           │  │  ├─ ComplexOperations.php
   │           │  │  ├─ Constants.php
   │           │  │  ├─ ConvertBase.php
   │           │  │  ├─ ConvertBinary.php
   │           │  │  ├─ ConvertDecimal.php
   │           │  │  ├─ ConvertHex.php
   │           │  │  ├─ ConvertOctal.php
   │           │  │  ├─ ConvertUOM.php
   │           │  │  ├─ EngineeringValidations.php
   │           │  │  ├─ Erf.php
   │           │  │  └─ ErfC.php
   │           │  ├─ Exception.php
   │           │  ├─ ExceptionHandler.php
   │           │  ├─ Financial
   │           │  │  ├─ Amortization.php
   │           │  │  ├─ CashFlow
   │           │  │  │  ├─ CashFlowValidations.php
   │           │  │  │  ├─ Constant
   │           │  │  │  │  ├─ Periodic
   │           │  │  │  │  │  ├─ Cumulative.php
   │           │  │  │  │  │  ├─ Interest.php
   │           │  │  │  │  │  ├─ InterestAndPrincipal.php
   │           │  │  │  │  │  └─ Payments.php
   │           │  │  │  │  └─ Periodic.php
   │           │  │  │  ├─ Single.php
   │           │  │  │  └─ Variable
   │           │  │  │     ├─ NonPeriodic.php
   │           │  │  │     └─ Periodic.php
   │           │  │  ├─ Constants.php
   │           │  │  ├─ Coupons.php
   │           │  │  ├─ Depreciation.php
   │           │  │  ├─ Dollar.php
   │           │  │  ├─ FinancialValidations.php
   │           │  │  ├─ Helpers.php
   │           │  │  ├─ InterestRate.php
   │           │  │  ├─ Securities
   │           │  │  │  ├─ AccruedInterest.php
   │           │  │  │  ├─ Price.php
   │           │  │  │  ├─ Rates.php
   │           │  │  │  ├─ SecurityValidations.php
   │           │  │  │  └─ Yields.php
   │           │  │  └─ TreasuryBill.php
   │           │  ├─ FormulaParser.php
   │           │  ├─ FormulaToken.php
   │           │  ├─ FunctionArray.php
   │           │  ├─ Functions.php
   │           │  ├─ Information
   │           │  │  ├─ ErrorValue.php
   │           │  │  ├─ ExcelError.php
   │           │  │  └─ Value.php
   │           │  ├─ Internal
   │           │  │  ├─ ExcelArrayPseudoFunctions.php
   │           │  │  ├─ MakeMatrix.php
   │           │  │  └─ WildcardMatch.php
   │           │  ├─ locale
   │           │  │  ├─ bg
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ cs
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ da
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ de
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ en
   │           │  │  │  └─ uk
   │           │  │  │     └─ config
   │           │  │  ├─ es
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ fi
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ fr
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ hu
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ it
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ nb
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ nl
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ pl
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ pt
   │           │  │  │  ├─ br
   │           │  │  │  │  ├─ config
   │           │  │  │  │  └─ functions
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ ru
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ sv
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  ├─ tr
   │           │  │  │  ├─ config
   │           │  │  │  └─ functions
   │           │  │  └─ Translations.xlsx
   │           │  ├─ Logical
   │           │  │  ├─ Boolean.php
   │           │  │  ├─ Conditional.php
   │           │  │  └─ Operations.php
   │           │  ├─ LookupRef
   │           │  │  ├─ Address.php
   │           │  │  ├─ ChooseRowsEtc.php
   │           │  │  ├─ ExcelMatch.php
   │           │  │  ├─ Filter.php
   │           │  │  ├─ Formula.php
   │           │  │  ├─ Helpers.php
   │           │  │  ├─ HLookup.php
   │           │  │  ├─ Hstack.php
   │           │  │  ├─ Hyperlink.php
   │           │  │  ├─ Indirect.php
   │           │  │  ├─ Lookup.php
   │           │  │  ├─ LookupBase.php
   │           │  │  ├─ LookupRefValidations.php
   │           │  │  ├─ Matrix.php
   │           │  │  ├─ Offset.php
   │           │  │  ├─ RowColumnInformation.php
   │           │  │  ├─ Selection.php
   │           │  │  ├─ Sort.php
   │           │  │  ├─ TorowTocol.php
   │           │  │  ├─ Unique.php
   │           │  │  ├─ VLookup.php
   │           │  │  └─ Vstack.php
   │           │  ├─ MathTrig
   │           │  │  ├─ Absolute.php
   │           │  │  ├─ Angle.php
   │           │  │  ├─ Arabic.php
   │           │  │  ├─ Base.php
   │           │  │  ├─ Ceiling.php
   │           │  │  ├─ Combinations.php
   │           │  │  ├─ Exp.php
   │           │  │  ├─ Factorial.php
   │           │  │  ├─ Floor.php
   │           │  │  ├─ Gcd.php
   │           │  │  ├─ Helpers.php
   │           │  │  ├─ IntClass.php
   │           │  │  ├─ Lcm.php
   │           │  │  ├─ Logarithms.php
   │           │  │  ├─ MatrixFunctions.php
   │           │  │  ├─ Operations.php
   │           │  │  ├─ Random.php
   │           │  │  ├─ Roman.php
   │           │  │  ├─ Round.php
   │           │  │  ├─ SeriesSum.php
   │           │  │  ├─ Sign.php
   │           │  │  ├─ Sqrt.php
   │           │  │  ├─ Subtotal.php
   │           │  │  ├─ Sum.php
   │           │  │  ├─ SumSquares.php
   │           │  │  ├─ Trig
   │           │  │  │  ├─ Cosecant.php
   │           │  │  │  ├─ Cosine.php
   │           │  │  │  ├─ Cotangent.php
   │           │  │  │  ├─ Secant.php
   │           │  │  │  ├─ Sine.php
   │           │  │  │  └─ Tangent.php
   │           │  │  └─ Trunc.php
   │           │  ├─ Statistical
   │           │  │  ├─ AggregateBase.php
   │           │  │  ├─ Averages
   │           │  │  │  └─ Mean.php
   │           │  │  ├─ Averages.php
   │           │  │  ├─ Conditional.php
   │           │  │  ├─ Confidence.php
   │           │  │  ├─ Counts.php
   │           │  │  ├─ Deviations.php
   │           │  │  ├─ Distributions
   │           │  │  │  ├─ Beta.php
   │           │  │  │  ├─ Binomial.php
   │           │  │  │  ├─ ChiSquared.php
   │           │  │  │  ├─ DistributionValidations.php
   │           │  │  │  ├─ Exponential.php
   │           │  │  │  ├─ F.php
   │           │  │  │  ├─ Fisher.php
   │           │  │  │  ├─ Gamma.php
   │           │  │  │  ├─ GammaBase.php
   │           │  │  │  ├─ HyperGeometric.php
   │           │  │  │  ├─ LogNormal.php
   │           │  │  │  ├─ NewtonRaphson.php
   │           │  │  │  ├─ Normal.php
   │           │  │  │  ├─ Poisson.php
   │           │  │  │  ├─ StandardNormal.php
   │           │  │  │  ├─ StudentT.php
   │           │  │  │  └─ Weibull.php
   │           │  │  ├─ Maximum.php
   │           │  │  ├─ MaxMinBase.php
   │           │  │  ├─ Minimum.php
   │           │  │  ├─ Percentiles.php
   │           │  │  ├─ Permutations.php
   │           │  │  ├─ Size.php
   │           │  │  ├─ StandardDeviations.php
   │           │  │  ├─ Standardize.php
   │           │  │  ├─ StatisticalValidations.php
   │           │  │  ├─ Trends.php
   │           │  │  ├─ VarianceBase.php
   │           │  │  └─ Variances.php
   │           │  ├─ TextData
   │           │  │  ├─ CaseConvert.php
   │           │  │  ├─ CharacterConvert.php
   │           │  │  ├─ Concatenate.php
   │           │  │  ├─ Extract.php
   │           │  │  ├─ Format.php
   │           │  │  ├─ Helpers.php
   │           │  │  ├─ Replace.php
   │           │  │  ├─ Search.php
   │           │  │  ├─ Text.php
   │           │  │  └─ Trim.php
   │           │  ├─ Token
   │           │  │  └─ Stack.php
   │           │  └─ Web
   │           │     └─ Service.php
   │           ├─ Cell
   │           │  ├─ AddressHelper.php
   │           │  ├─ AddressRange.php
   │           │  ├─ AdvancedValueBinder.php
   │           │  ├─ Cell.php
   │           │  ├─ CellAddress.php
   │           │  ├─ CellRange.php
   │           │  ├─ ColumnRange.php
   │           │  ├─ Coordinate.php
   │           │  ├─ DataType.php
   │           │  ├─ DataValidation.php
   │           │  ├─ DataValidator.php
   │           │  ├─ DefaultValueBinder.php
   │           │  ├─ Hyperlink.php
   │           │  ├─ IgnoredErrors.php
   │           │  ├─ IValueBinder.php
   │           │  ├─ RowRange.php
   │           │  └─ StringValueBinder.php
   │           ├─ CellReferenceHelper.php
   │           ├─ Chart
   │           │  ├─ Axis.php
   │           │  ├─ AxisText.php
   │           │  ├─ Chart.php
   │           │  ├─ ChartColor.php
   │           │  ├─ DataSeries.php
   │           │  ├─ DataSeriesValues.php
   │           │  ├─ Exception.php
   │           │  ├─ GridLines.php
   │           │  ├─ Layout.php
   │           │  ├─ Legend.php
   │           │  ├─ PlotArea.php
   │           │  ├─ Properties.php
   │           │  ├─ Renderer
   │           │  │  ├─ IRenderer.php
   │           │  │  ├─ JpGraph.php
   │           │  │  ├─ JpGraphRendererBase.php
   │           │  │  ├─ MtJpGraphRenderer.php
   │           │  │  └─ PHP Charting Libraries.txt
   │           │  ├─ Title.php
   │           │  └─ TrendLine.php
   │           ├─ Collection
   │           │  ├─ Cells.php
   │           │  ├─ CellsFactory.php
   │           │  └─ Memory
   │           │     ├─ SimpleCache1.php
   │           │     └─ SimpleCache3.php
   │           ├─ Comment.php
   │           ├─ DefinedName.php
   │           ├─ Document
   │           │  ├─ Properties.php
   │           │  └─ Security.php
   │           ├─ Exception.php
   │           ├─ HashTable.php
   │           ├─ Helper
   │           │  ├─ Dimension.php
   │           │  ├─ Downloader.php
   │           │  ├─ Handler.php
   │           │  ├─ Html.php
   │           │  ├─ Sample.php
   │           │  ├─ Size.php
   │           │  └─ TextGrid.php
   │           ├─ IComparable.php
   │           ├─ IOFactory.php
   │           ├─ NamedFormula.php
   │           ├─ NamedRange.php
   │           ├─ Reader
   │           │  ├─ BaseReader.php
   │           │  ├─ Csv
   │           │  │  └─ Delimiter.php
   │           │  ├─ Csv.php
   │           │  ├─ DefaultReadFilter.php
   │           │  ├─ Exception.php
   │           │  ├─ Gnumeric
   │           │  │  ├─ PageSetup.php
   │           │  │  ├─ Properties.php
   │           │  │  └─ Styles.php
   │           │  ├─ Gnumeric.php
   │           │  ├─ Html.php
   │           │  ├─ IReader.php
   │           │  ├─ IReadFilter.php
   │           │  ├─ Ods
   │           │  │  ├─ AutoFilter.php
   │           │  │  ├─ BaseLoader.php
   │           │  │  ├─ DefinedNames.php
   │           │  │  ├─ FormulaTranslator.php
   │           │  │  ├─ PageSettings.php
   │           │  │  └─ Properties.php
   │           │  ├─ Ods.php
   │           │  ├─ Security
   │           │  │  └─ XmlScanner.php
   │           │  ├─ Slk.php
   │           │  ├─ Xls
   │           │  │  ├─ Biff5.php
   │           │  │  ├─ Biff8.php
   │           │  │  ├─ Color
   │           │  │  │  ├─ BIFF5.php
   │           │  │  │  ├─ BIFF8.php
   │           │  │  │  └─ BuiltIn.php
   │           │  │  ├─ Color.php
   │           │  │  ├─ ConditionalFormatting.php
   │           │  │  ├─ DataValidationHelper.php
   │           │  │  ├─ ErrorCode.php
   │           │  │  ├─ Escher.php
   │           │  │  ├─ ListFunctions.php
   │           │  │  ├─ LoadSpreadsheet.php
   │           │  │  ├─ Mappings.php
   │           │  │  ├─ MD5.php
   │           │  │  ├─ RC4.php
   │           │  │  └─ Style
   │           │  │     ├─ Border.php
   │           │  │     ├─ CellAlignment.php
   │           │  │     ├─ CellFont.php
   │           │  │     └─ FillPattern.php
   │           │  ├─ Xls.php
   │           │  ├─ XlsBase.php
   │           │  ├─ Xlsx
   │           │  │  ├─ AutoFilter.php
   │           │  │  ├─ BaseParserClass.php
   │           │  │  ├─ Chart.php
   │           │  │  ├─ ColumnAndRowAttributes.php
   │           │  │  ├─ ConditionalStyles.php
   │           │  │  ├─ DataValidations.php
   │           │  │  ├─ Hyperlinks.php
   │           │  │  ├─ Namespaces.php
   │           │  │  ├─ PageSetup.php
   │           │  │  ├─ Properties.php
   │           │  │  ├─ SharedFormula.php
   │           │  │  ├─ SheetViewOptions.php
   │           │  │  ├─ SheetViews.php
   │           │  │  ├─ Styles.php
   │           │  │  ├─ TableReader.php
   │           │  │  ├─ Theme.php
   │           │  │  └─ WorkbookView.php
   │           │  ├─ Xlsx.php
   │           │  ├─ Xml
   │           │  │  ├─ DataValidations.php
   │           │  │  ├─ PageSettings.php
   │           │  │  ├─ Properties.php
   │           │  │  ├─ Style
   │           │  │  │  ├─ Alignment.php
   │           │  │  │  ├─ Border.php
   │           │  │  │  ├─ Fill.php
   │           │  │  │  ├─ Font.php
   │           │  │  │  ├─ NumberFormat.php
   │           │  │  │  └─ StyleBase.php
   │           │  │  └─ Style.php
   │           │  └─ Xml.php
   │           ├─ ReferenceHelper.php
   │           ├─ RichText
   │           │  ├─ ITextElement.php
   │           │  ├─ RichText.php
   │           │  ├─ Run.php
   │           │  └─ TextElement.php
   │           ├─ Settings.php
   │           ├─ Shared
   │           │  ├─ CodePage.php
   │           │  ├─ Date.php
   │           │  ├─ Drawing.php
   │           │  ├─ Escher
   │           │  │  ├─ DgContainer
   │           │  │  │  ├─ SpgrContainer
   │           │  │  │  │  └─ SpContainer.php
   │           │  │  │  └─ SpgrContainer.php
   │           │  │  ├─ DgContainer.php
   │           │  │  ├─ DggContainer
   │           │  │  │  ├─ BstoreContainer
   │           │  │  │  │  ├─ BSE
   │           │  │  │  │  │  └─ Blip.php
   │           │  │  │  │  └─ BSE.php
   │           │  │  │  └─ BstoreContainer.php
   │           │  │  └─ DggContainer.php
   │           │  ├─ Escher.php
   │           │  ├─ File.php
   │           │  ├─ Font.php
   │           │  ├─ IntOrFloat.php
   │           │  ├─ OLE
   │           │  │  ├─ ChainedBlockStream.php
   │           │  │  ├─ PPS
   │           │  │  │  ├─ File.php
   │           │  │  │  └─ Root.php
   │           │  │  └─ PPS.php
   │           │  ├─ OLE.php
   │           │  ├─ OLERead.php
   │           │  ├─ PasswordHasher.php
   │           │  ├─ StringHelper.php
   │           │  ├─ TimeZone.php
   │           │  ├─ Trend
   │           │  │  ├─ BestFit.php
   │           │  │  ├─ ExponentialBestFit.php
   │           │  │  ├─ LinearBestFit.php
   │           │  │  ├─ LogarithmicBestFit.php
   │           │  │  ├─ PolynomialBestFit.php
   │           │  │  ├─ PowerBestFit.php
   │           │  │  └─ Trend.php
   │           │  ├─ Xls.php
   │           │  └─ XMLWriter.php
   │           ├─ Spreadsheet.php
   │           ├─ Style
   │           │  ├─ Alignment.php
   │           │  ├─ Border.php
   │           │  ├─ Borders.php
   │           │  ├─ Color.php
   │           │  ├─ Conditional.php
   │           │  ├─ ConditionalFormatting
   │           │  │  ├─ CellMatcher.php
   │           │  │  ├─ CellStyleAssessor.php
   │           │  │  ├─ ConditionalColorScale.php
   │           │  │  ├─ ConditionalDataBar.php
   │           │  │  ├─ ConditionalDataBarExtension.php
   │           │  │  ├─ ConditionalFormattingRuleExtension.php
   │           │  │  ├─ ConditionalFormatValueObject.php
   │           │  │  ├─ StyleMerger.php
   │           │  │  ├─ Wizard
   │           │  │  │  ├─ Blanks.php
   │           │  │  │  ├─ CellValue.php
   │           │  │  │  ├─ DateValue.php
   │           │  │  │  ├─ Duplicates.php
   │           │  │  │  ├─ Errors.php
   │           │  │  │  ├─ Expression.php
   │           │  │  │  ├─ TextValue.php
   │           │  │  │  ├─ WizardAbstract.php
   │           │  │  │  └─ WizardInterface.php
   │           │  │  └─ Wizard.php
   │           │  ├─ Fill.php
   │           │  ├─ Font.php
   │           │  ├─ NumberFormat
   │           │  │  ├─ BaseFormatter.php
   │           │  │  ├─ DateFormatter.php
   │           │  │  ├─ Formatter.php
   │           │  │  ├─ FractionFormatter.php
   │           │  │  ├─ NumberFormatter.php
   │           │  │  ├─ PercentageFormatter.php
   │           │  │  └─ Wizard
   │           │  │     ├─ Accounting.php
   │           │  │     ├─ Currency.php
   │           │  │     ├─ CurrencyBase.php
   │           │  │     ├─ CurrencyNegative.php
   │           │  │     ├─ Date.php
   │           │  │     ├─ DateTime.php
   │           │  │     ├─ DateTimeWizard.php
   │           │  │     ├─ Duration.php
   │           │  │     ├─ Locale.php
   │           │  │     ├─ Number.php
   │           │  │     ├─ NumberBase.php
   │           │  │     ├─ Percentage.php
   │           │  │     ├─ Scientific.php
   │           │  │     ├─ Time.php
   │           │  │     └─ Wizard.php
   │           │  ├─ NumberFormat.php
   │           │  ├─ Protection.php
   │           │  ├─ RgbTint.php
   │           │  ├─ Style.php
   │           │  └─ Supervisor.php
   │           ├─ Theme.php
   │           ├─ Worksheet
   │           │  ├─ AutoFilter
   │           │  │  ├─ Column
   │           │  │  │  └─ Rule.php
   │           │  │  └─ Column.php
   │           │  ├─ AutoFilter.php
   │           │  ├─ AutoFit.php
   │           │  ├─ BaseDrawing.php
   │           │  ├─ CellIterator.php
   │           │  ├─ Column.php
   │           │  ├─ ColumnCellIterator.php
   │           │  ├─ ColumnDimension.php
   │           │  ├─ ColumnIterator.php
   │           │  ├─ Dimension.php
   │           │  ├─ Drawing
   │           │  │  └─ Shadow.php
   │           │  ├─ Drawing.php
   │           │  ├─ HeaderFooter.php
   │           │  ├─ HeaderFooterDrawing.php
   │           │  ├─ Iterator.php
   │           │  ├─ MemoryDrawing.php
   │           │  ├─ PageBreak.php
   │           │  ├─ PageMargins.php
   │           │  ├─ PageSetup.php
   │           │  ├─ Pane.php
   │           │  ├─ ProtectedRange.php
   │           │  ├─ Protection.php
   │           │  ├─ Row.php
   │           │  ├─ RowCellIterator.php
   │           │  ├─ RowDimension.php
   │           │  ├─ RowIterator.php
   │           │  ├─ SheetView.php
   │           │  ├─ Table
   │           │  │  ├─ Column.php
   │           │  │  ├─ TableDxfsStyle.php
   │           │  │  └─ TableStyle.php
   │           │  ├─ Table.php
   │           │  ├─ Validations.php
   │           │  └─ Worksheet.php
   │           └─ Writer
   │              ├─ BaseWriter.php
   │              ├─ Csv.php
   │              ├─ Exception.php
   │              ├─ Html.php
   │              ├─ IWriter.php
   │              ├─ Ods
   │              │  ├─ AutoFilters.php
   │              │  ├─ Cell
   │              │  │  ├─ Comment.php
   │              │  │  └─ Style.php
   │              │  ├─ Content.php
   │              │  ├─ Formula.php
   │              │  ├─ Meta.php
   │              │  ├─ MetaInf.php
   │              │  ├─ Mimetype.php
   │              │  ├─ NamedExpressions.php
   │              │  ├─ Settings.php
   │              │  ├─ Styles.php
   │              │  ├─ Thumbnails.php
   │              │  └─ WriterPart.php
   │              ├─ Ods.php
   │              ├─ Pdf
   │              │  ├─ Dompdf.php
   │              │  ├─ Mpdf.php
   │              │  └─ Tcpdf.php
   │              ├─ Pdf.php
   │              ├─ Xls
   │              │  ├─ BIFFwriter.php
   │              │  ├─ CellDataValidation.php
   │              │  ├─ ConditionalHelper.php
   │              │  ├─ ErrorCode.php
   │              │  ├─ Escher.php
   │              │  ├─ Font.php
   │              │  ├─ Parser.php
   │              │  ├─ Style
   │              │  │  ├─ CellAlignment.php
   │              │  │  ├─ CellBorder.php
   │              │  │  └─ CellFill.php
   │              │  ├─ Workbook.php
   │              │  ├─ Worksheet.php
   │              │  └─ Xf.php
   │              ├─ Xls.php
   │              ├─ Xlsx
   │              │  ├─ AutoFilter.php
   │              │  ├─ Chart.php
   │              │  ├─ Comments.php
   │              │  ├─ ContentTypes.php
   │              │  ├─ DefinedNames.php
   │              │  ├─ DocProps.php
   │              │  ├─ Drawing.php
   │              │  ├─ FunctionPrefix.php
   │              │  ├─ Metadata.php
   │              │  ├─ Rels.php
   │              │  ├─ RelsRibbon.php
   │              │  ├─ RelsVBA.php
   │              │  ├─ StringTable.php
   │              │  ├─ Style.php
   │              │  ├─ Table.php
   │              │  ├─ Theme.php
   │              │  ├─ Workbook.php
   │              │  ├─ Worksheet.php
   │              │  └─ WriterPart.php
   │              ├─ Xlsx.php
   │              ├─ ZipStream0.php
   │              ├─ ZipStream2.php
   │              └─ ZipStream3.php
   ├─ phpoption
   │  └─ phpoption
   │     ├─ composer.json
   │     ├─ LICENSE
   │     └─ src
   │        └─ PhpOption
   │           ├─ LazyOption.php
   │           ├─ None.php
   │           ├─ Option.php
   │           └─ Some.php
   ├─ psr
   │  ├─ http-client
   │  │  ├─ CHANGELOG.md
   │  │  ├─ composer.json
   │  │  ├─ LICENSE
   │  │  ├─ README.md
   │  │  └─ src
   │  │     ├─ ClientExceptionInterface.php
   │  │     ├─ ClientInterface.php
   │  │     ├─ NetworkExceptionInterface.php
   │  │     └─ RequestExceptionInterface.php
   │  ├─ http-factory
   │  │  ├─ composer.json
   │  │  ├─ LICENSE
   │  │  ├─ README.md
   │  │  └─ src
   │  │     ├─ RequestFactoryInterface.php
   │  │     ├─ ResponseFactoryInterface.php
   │  │     ├─ ServerRequestFactoryInterface.php
   │  │     ├─ StreamFactoryInterface.php
   │  │     ├─ UploadedFileFactoryInterface.php
   │  │     └─ UriFactoryInterface.php
   │  ├─ http-message
   │  │  ├─ CHANGELOG.md
   │  │  ├─ composer.json
   │  │  ├─ docs
   │  │  │  ├─ PSR7-Interfaces.md
   │  │  │  └─ PSR7-Usage.md
   │  │  ├─ LICENSE
   │  │  ├─ README.md
   │  │  └─ src
   │  │     ├─ MessageInterface.php
   │  │     ├─ RequestInterface.php
   │  │     ├─ ResponseInterface.php
   │  │     ├─ ServerRequestInterface.php
   │  │     ├─ StreamInterface.php
   │  │     ├─ UploadedFileInterface.php
   │  │     └─ UriInterface.php
   │  └─ simple-cache
   │     ├─ .editorconfig
   │     ├─ composer.json
   │     ├─ LICENSE.md
   │     ├─ README.md
   │     └─ src
   │        ├─ CacheException.php
   │        ├─ CacheInterface.php
   │        └─ InvalidArgumentException.php
   ├─ setasign
   │  ├─ fpdi
   │  │  ├─ composer.json
   │  │  ├─ LICENSE.txt
   │  │  ├─ README.md
   │  │  ├─ SECURITY.md
   │  │  └─ src
   │  │     ├─ autoload.php
   │  │     ├─ FpdfTpl.php
   │  │     ├─ FpdfTplTrait.php
   │  │     ├─ FpdfTrait.php
   │  │     ├─ Fpdi.php
   │  │     ├─ FpdiException.php
   │  │     ├─ FpdiTrait.php
   │  │     ├─ GraphicsState.php
   │  │     ├─ Math
   │  │     │  ├─ Matrix.php
   │  │     │  └─ Vector.php
   │  │     ├─ PdfParser
   │  │     │  ├─ CrossReference
   │  │     │  │  ├─ AbstractReader.php
   │  │     │  │  ├─ CrossReference.php
   │  │     │  │  ├─ CrossReferenceException.php
   │  │     │  │  ├─ FixedReader.php
   │  │     │  │  ├─ LineReader.php
   │  │     │  │  └─ ReaderInterface.php
   │  │     │  ├─ Filter
   │  │     │  │  ├─ Ascii85.php
   │  │     │  │  ├─ Ascii85Exception.php
   │  │     │  │  ├─ AsciiHex.php
   │  │     │  │  ├─ FilterException.php
   │  │     │  │  ├─ FilterInterface.php
   │  │     │  │  ├─ Flate.php
   │  │     │  │  ├─ FlateException.php
   │  │     │  │  ├─ Lzw.php
   │  │     │  │  └─ LzwException.php
   │  │     │  ├─ PdfParser.php
   │  │     │  ├─ PdfParserException.php
   │  │     │  ├─ StreamReader.php
   │  │     │  ├─ Tokenizer.php
   │  │     │  └─ Type
   │  │     │     ├─ PdfArray.php
   │  │     │     ├─ PdfBoolean.php
   │  │     │     ├─ PdfDictionary.php
   │  │     │     ├─ PdfHexString.php
   │  │     │     ├─ PdfIndirectObject.php
   │  │     │     ├─ PdfIndirectObjectReference.php
   │  │     │     ├─ PdfName.php
   │  │     │     ├─ PdfNull.php
   │  │     │     ├─ PdfNumeric.php
   │  │     │     ├─ PdfStream.php
   │  │     │     ├─ PdfString.php
   │  │     │     ├─ PdfToken.php
   │  │     │     ├─ PdfType.php
   │  │     │     └─ PdfTypeException.php
   │  │     ├─ PdfReader
   │  │     │  ├─ DataStructure
   │  │     │  │  └─ Rectangle.php
   │  │     │  ├─ Page.php
   │  │     │  ├─ PageBoundaries.php
   │  │     │  ├─ PdfReader.php
   │  │     │  └─ PdfReaderException.php
   │  │     ├─ Tcpdf
   │  │     │  └─ Fpdi.php
   │  │     ├─ TcpdfFpdi.php
   │  │     └─ Tfpdf
   │  │        ├─ FpdfTpl.php
   │  │        └─ Fpdi.php
   │  └─ fpdi-tcpdf
   │     ├─ composer.json
   │     ├─ LICENSE.txt
   │     └─ README.md
   ├─ symfony
   │  ├─ polyfill-ctype
   │  │  ├─ bootstrap.php
   │  │  ├─ bootstrap80.php
   │  │  ├─ composer.json
   │  │  ├─ Ctype.php
   │  │  ├─ LICENSE
   │  │  └─ README.md
   │  ├─ polyfill-mbstring
   │  │  ├─ bootstrap.php
   │  │  ├─ bootstrap80.php
   │  │  ├─ composer.json
   │  │  ├─ LICENSE
   │  │  ├─ Mbstring.php
   │  │  ├─ README.md
   │  │  └─ Resources
   │  │     └─ unidata
   │  │        ├─ caseFolding.php
   │  │        ├─ lowerCase.php
   │  │        ├─ titleCaseRegexp.php
   │  │        └─ upperCase.php
   │  └─ polyfill-php80
   │     ├─ bootstrap.php
   │     ├─ composer.json
   │     ├─ LICENSE
   │     ├─ Php80.php
   │     ├─ PhpToken.php
   │     ├─ README.md
   │     └─ Resources
   │        └─ stubs
   │           ├─ Attribute.php
   │           ├─ PhpToken.php
   │           ├─ Stringable.php
   │           ├─ UnhandledMatchError.php
   │           └─ ValueError.php
   ├─ tecnickcom
   │  └─ tcpdf
   │     ├─ CHANGELOG.TXT
   │     ├─ composer.json
   │     ├─ config
   │     │  └─ tcpdf_config.php
   │     ├─ fonts
   │     │  ├─ aealarabiya.ctg.z
   │     │  ├─ aealarabiya.php
   │     │  ├─ aealarabiya.z
   │     │  ├─ aefurat.ctg.z
   │     │  ├─ aefurat.php
   │     │  ├─ aefurat.z
   │     │  ├─ ae_fonts_2.0
   │     │  │  ├─ ChangeLog
   │     │  │  ├─ COPYING
   │     │  │  └─ README
   │     │  ├─ cid0cs.php
   │     │  ├─ cid0ct.php
   │     │  ├─ cid0jp.php
   │     │  ├─ cid0kr.php
   │     │  ├─ courier.php
   │     │  ├─ courierb.php
   │     │  ├─ courierbi.php
   │     │  ├─ courieri.php
   │     │  ├─ dejavu-fonts-ttf-2.33
   │     │  │  ├─ AUTHORS
   │     │  │  ├─ BUGS
   │     │  │  ├─ langcover.txt
   │     │  │  ├─ LICENSE
   │     │  │  ├─ NEWS
   │     │  │  ├─ README
   │     │  │  └─ unicover.txt
   │     │  ├─ dejavu-fonts-ttf-2.34
   │     │  │  ├─ AUTHORS
   │     │  │  ├─ BUGS
   │     │  │  ├─ langcover.txt
   │     │  │  ├─ LICENSE
   │     │  │  ├─ NEWS
   │     │  │  ├─ README
   │     │  │  └─ unicover.txt
   │     │  ├─ dejavusans.ctg.z
   │     │  ├─ dejavusans.php
   │     │  ├─ dejavusans.z
   │     │  ├─ dejavusansb.ctg.z
   │     │  ├─ dejavusansb.php
   │     │  ├─ dejavusansb.z
   │     │  ├─ dejavusansbi.ctg.z
   │     │  ├─ dejavusansbi.php
   │     │  ├─ dejavusansbi.z
   │     │  ├─ dejavusanscondensed.ctg.z
   │     │  ├─ dejavusanscondensed.php
   │     │  ├─ dejavusanscondensed.z
   │     │  ├─ dejavusanscondensedb.ctg.z
   │     │  ├─ dejavusanscondensedb.php
   │     │  ├─ dejavusanscondensedb.z
   │     │  ├─ dejavusanscondensedbi.ctg.z
   │     │  ├─ dejavusanscondensedbi.php
   │     │  ├─ dejavusanscondensedbi.z
   │     │  ├─ dejavusanscondensedi.ctg.z
   │     │  ├─ dejavusanscondensedi.php
   │     │  ├─ dejavusanscondensedi.z
   │     │  ├─ dejavusansextralight.ctg.z
   │     │  ├─ dejavusansextralight.php
   │     │  ├─ dejavusansextralight.z
   │     │  ├─ dejavusansi.ctg.z
   │     │  ├─ dejavusansi.php
   │     │  ├─ dejavusansi.z
   │     │  ├─ dejavusansmono.ctg.z
   │     │  ├─ dejavusansmono.php
   │     │  ├─ dejavusansmono.z
   │     │  ├─ dejavusansmonob.ctg.z
   │     │  ├─ dejavusansmonob.php
   │     │  ├─ dejavusansmonob.z
   │     │  ├─ dejavusansmonobi.ctg.z
   │     │  ├─ dejavusansmonobi.php
   │     │  ├─ dejavusansmonobi.z
   │     │  ├─ dejavusansmonoi.ctg.z
   │     │  ├─ dejavusansmonoi.php
   │     │  ├─ dejavusansmonoi.z
   │     │  ├─ dejavuserif.ctg.z
   │     │  ├─ dejavuserif.php
   │     │  ├─ dejavuserif.z
   │     │  ├─ dejavuserifb.ctg.z
   │     │  ├─ dejavuserifb.php
   │     │  ├─ dejavuserifb.z
   │     │  ├─ dejavuserifbi.ctg.z
   │     │  ├─ dejavuserifbi.php
   │     │  ├─ dejavuserifbi.z
   │     │  ├─ dejavuserifcondensed.ctg.z
   │     │  ├─ dejavuserifcondensed.php
   │     │  ├─ dejavuserifcondensed.z
   │     │  ├─ dejavuserifcondensedb.ctg.z
   │     │  ├─ dejavuserifcondensedb.php
   │     │  ├─ dejavuserifcondensedb.z
   │     │  ├─ dejavuserifcondensedbi.ctg.z
   │     │  ├─ dejavuserifcondensedbi.php
   │     │  ├─ dejavuserifcondensedbi.z
   │     │  ├─ dejavuserifcondensedi.ctg.z
   │     │  ├─ dejavuserifcondensedi.php
   │     │  ├─ dejavuserifcondensedi.z
   │     │  ├─ dejavuserifi.ctg.z
   │     │  ├─ dejavuserifi.php
   │     │  ├─ dejavuserifi.z
   │     │  ├─ freefont-20100919
   │     │  │  ├─ AUTHORS
   │     │  │  ├─ ChangeLog
   │     │  │  ├─ COPYING
   │     │  │  ├─ CREDITS
   │     │  │  ├─ INSTALL
   │     │  │  └─ README
   │     │  ├─ freefont-20120503
   │     │  │  ├─ AUTHORS
   │     │  │  ├─ ChangeLog
   │     │  │  ├─ COPYING
   │     │  │  ├─ CREDITS
   │     │  │  ├─ INSTALL
   │     │  │  ├─ README
   │     │  │  ├─ TROUBLESHOOTING
   │     │  │  └─ USAGE
   │     │  ├─ freemono.ctg.z
   │     │  ├─ freemono.php
   │     │  ├─ freemono.z
   │     │  ├─ freemonob.ctg.z
   │     │  ├─ freemonob.php
   │     │  ├─ freemonob.z
   │     │  ├─ freemonobi.ctg.z
   │     │  ├─ freemonobi.php
   │     │  ├─ freemonobi.z
   │     │  ├─ freemonoi.ctg.z
   │     │  ├─ freemonoi.php
   │     │  ├─ freemonoi.z
   │     │  ├─ freesans.ctg.z
   │     │  ├─ freesans.php
   │     │  ├─ freesans.z
   │     │  ├─ freesansb.ctg.z
   │     │  ├─ freesansb.php
   │     │  ├─ freesansb.z
   │     │  ├─ freesansbi.ctg.z
   │     │  ├─ freesansbi.php
   │     │  ├─ freesansbi.z
   │     │  ├─ freesansi.ctg.z
   │     │  ├─ freesansi.php
   │     │  ├─ freesansi.z
   │     │  ├─ freeserif.ctg.z
   │     │  ├─ freeserif.php
   │     │  ├─ freeserif.z
   │     │  ├─ freeserifb.ctg.z
   │     │  ├─ freeserifb.php
   │     │  ├─ freeserifb.z
   │     │  ├─ freeserifbi.ctg.z
   │     │  ├─ freeserifbi.php
   │     │  ├─ freeserifbi.z
   │     │  ├─ freeserifi.ctg.z
   │     │  ├─ freeserifi.php
   │     │  ├─ freeserifi.z
   │     │  ├─ helvetica.php
   │     │  ├─ helveticab.php
   │     │  ├─ helveticabi.php
   │     │  ├─ helveticai.php
   │     │  ├─ hysmyeongjostdmedium.php
   │     │  ├─ kozgopromedium.php
   │     │  ├─ kozminproregular.php
   │     │  ├─ msungstdlight.php
   │     │  ├─ pdfacourier.php
   │     │  ├─ pdfacourier.z
   │     │  ├─ pdfacourierb.php
   │     │  ├─ pdfacourierb.z
   │     │  ├─ pdfacourierbi.php
   │     │  ├─ pdfacourierbi.z
   │     │  ├─ pdfacourieri.php
   │     │  ├─ pdfacourieri.z
   │     │  ├─ pdfahelvetica.php
   │     │  ├─ pdfahelvetica.z
   │     │  ├─ pdfahelveticab.php
   │     │  ├─ pdfahelveticab.z
   │     │  ├─ pdfahelveticabi.php
   │     │  ├─ pdfahelveticabi.z
   │     │  ├─ pdfahelveticai.php
   │     │  ├─ pdfahelveticai.z
   │     │  ├─ pdfasymbol.php
   │     │  ├─ pdfasymbol.z
   │     │  ├─ pdfatimes.php
   │     │  ├─ pdfatimes.z
   │     │  ├─ pdfatimesb.php
   │     │  ├─ pdfatimesb.z
   │     │  ├─ pdfatimesbi.php
   │     │  ├─ pdfatimesbi.z
   │     │  ├─ pdfatimesi.php
   │     │  ├─ pdfatimesi.z
   │     │  ├─ pdfazapfdingbats.php
   │     │  ├─ pdfazapfdingbats.z
   │     │  ├─ stsongstdlight.php
   │     │  ├─ symbol.php
   │     │  ├─ times.php
   │     │  ├─ timesb.php
   │     │  ├─ timesbi.php
   │     │  ├─ timesi.php
   │     │  ├─ uni2cid_ac15.php
   │     │  ├─ uni2cid_ag15.php
   │     │  ├─ uni2cid_aj16.php
   │     │  ├─ uni2cid_ak12.php
   │     │  └─ zapfdingbats.php
   │     ├─ include
   │     │  ├─ barcodes
   │     │  │  ├─ datamatrix.php
   │     │  │  ├─ pdf417.php
   │     │  │  └─ qrcode.php
   │     │  ├─ sRGB.icc
   │     │  ├─ tcpdf_colors.php
   │     │  ├─ tcpdf_filters.php
   │     │  ├─ tcpdf_fonts.php
   │     │  ├─ tcpdf_font_data.php
   │     │  ├─ tcpdf_images.php
   │     │  └─ tcpdf_static.php
   │     ├─ LICENSE.TXT
   │     ├─ README.md
   │     ├─ tcpdf.php
   │     ├─ tcpdf_autoconfig.php
   │     ├─ tcpdf_barcodes_1d.php
   │     ├─ tcpdf_barcodes_2d.php
   │     ├─ tools
   │     │  ├─ .htaccess
   │     │  ├─ convert_fonts_examples.txt
   │     │  └─ tcpdf_addfont.php
   │     └─ VERSION
   └─ vlucas
      └─ phpdotenv
         ├─ composer.json
         ├─ LICENSE
         └─ src
            ├─ Dotenv.php
            ├─ Exception
            │  ├─ ExceptionInterface.php
            │  ├─ InvalidEncodingException.php
            │  ├─ InvalidFileException.php
            │  ├─ InvalidPathException.php
            │  └─ ValidationException.php
            ├─ Loader
            │  ├─ Loader.php
            │  ├─ LoaderInterface.php
            │  └─ Resolver.php
            ├─ Parser
            │  ├─ Entry.php
            │  ├─ EntryParser.php
            │  ├─ Lexer.php
            │  ├─ Lines.php
            │  ├─ Parser.php
            │  ├─ ParserInterface.php
            │  └─ Value.php
            ├─ Repository
            │  ├─ Adapter
            │  │  ├─ AdapterInterface.php
            │  │  ├─ ApacheAdapter.php
            │  │  ├─ ArrayAdapter.php
            │  │  ├─ EnvConstAdapter.php
            │  │  ├─ GuardedWriter.php
            │  │  ├─ ImmutableWriter.php
            │  │  ├─ MultiReader.php
            │  │  ├─ MultiWriter.php
            │  │  ├─ PutenvAdapter.php
            │  │  ├─ ReaderInterface.php
            │  │  ├─ ReplacingWriter.php
            │  │  ├─ ServerConstAdapter.php
            │  │  └─ WriterInterface.php
            │  ├─ AdapterRepository.php
            │  ├─ RepositoryBuilder.php
            │  └─ RepositoryInterface.php
            ├─ Store
            │  ├─ File
            │  │  ├─ Paths.php
            │  │  └─ Reader.php
            │  ├─ FileStore.php
            │  ├─ StoreBuilder.php
            │  ├─ StoreInterface.php
            │  └─ StringStore.php
            ├─ Util
            │  ├─ Regex.php
            │  └─ Str.php
            └─ Validator.php

```