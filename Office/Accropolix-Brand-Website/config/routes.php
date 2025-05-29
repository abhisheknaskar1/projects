<?php

/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {

    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {

        $builder->connect('/', [
            'controller' => 'Pages',
            'action' => 'landingForm',
        ])
            ->setHost('ebook.accropolix.ai');
        $builder->connect('/', ['controller' => 'Pages', 'action' => 'index']);
        $builder->connect('/services-and-solutions', ['controller' => 'Pages', 'action' => 'servicesAndSolutions']);
        $builder->connect('/contact', ['controller' => 'Pages', 'action' => 'contact']);
        $builder->connect('/thank-you', ['controller' => 'Pages', 'action' => 'thankYou']);
        $builder->connect('/ebook-thank-you', ['controller' => 'Pages', 'action' => 'ebookThankYou']);
        $builder->connect('/case-study-thank-you', ['controller' => 'Pages', 'action' => 'caseStudyThankYou']);
        $builder->connect('/RevOps', ['controller' => 'Pages', 'action' => 'accelerateMarket']);
        $builder->connect('/go-to-market', ['controller' => 'Pages', 'action' => 'goToMarket']);
        $builder->connect('/customer-stories', ['controller' => 'Pages', 'action' => 'customerStories']);
        $builder->connect('/thank-you-seo-audit', ['controller' => 'Pages', 'action' => 'thankYouSeoAudit']);
        $builder->connect('/thank-you-seo-case-studies', ['controller' => 'Pages', 'action' => 'thankYouSeoCaseStudies']);
        $builder->connect('/thank-you-seo-free-consulation', ['controller' => 'Pages', 'action' => 'thankYouSeoFreeConsulation']);
        $builder->connect('/generative-ai', ['controller' => 'Pages', 'action' => 'genAi']);

        // $builder->connect('/extra', ['controller' => 'Pages', 'action' => 'extra']);


        // $builder->connect('/about-us', ['controller' => 'Pages', 'action' => 'about']);

        // ------------------------------ Customer Stories--------------------------------
        $builder->connect('/customer-stories/how-a-top-zoho-advanced-implementation-partner-amplified-its-market-visibility-and-sales-with-value-selling-&-marketing-automation', ['controller' => 'Pages', 'action' => 'csOne']);
        $builder->connect('/customer-stories/how-a-leading-business-consulting-firm-unlocked-growth-and-won-customer-trust', ['controller' => 'Pages', 'action' => 'csTwo']);
        $builder->connect('/customer-stories/fixing-disconnect-between-expertise-and-communication-for-leading-it-service-provider', ['controller' => 'Pages', 'action' => 'csThree']);
        $builder->connect('/customer-stories/how-a-white-labeled-remittance-saa-provider-enhanced-customer-acquisition-and-lifetime-value', ['controller' => 'Pages', 'action' => 'csFour']);
        $builder->connect('/customer-stories/from-chaos-to-customer-centricity-a-revOps-transformation-story', ['controller' => 'Pages', 'action' => 'csFive']);
        $builder->connect('/customer-stories/updating-compliance-data-engineering-for-aml-and-sanction-screening', ['controller' => 'Pages', 'action' => 'caseStudies']);
        $builder->connect('/customer-stories/retail-marketing-data-pipelines-and-data-warehouse', ['controller' => 'Pages', 'action' => 'caseStudiesTwo']);
        $builder->connect('/customer-stories/strategic-competency-mapping-lifts-productivity', ['controller' => 'Pages', 'action' => 'csSix']);
        $builder->connect('/customer-stories/2x-faster-deployments-with-real-time-etl-pipeline-and-predictive-healthcare-models', ['controller' => 'Pages', 'action' => 'csSeven']);

        $builder->connect('/accro-abm', ['controller' => 'Pages', 'action' => 'sdr']);
        $builder->connect('/tactical-search-engine-discover', ['controller' => 'Pages', 'action' => 'linkdeinProfileOptimization']);
        $builder->connect('/inside-sales', ['controller' => 'Pages', 'action' => 'socialPresence']);
        $builder->connect('/accro-demand-generation', ['controller' => 'Pages', 'action' => 'visualDesign']);

        $builder->connect('/accro-content-marketing', ['controller' => 'Pages', 'action' => 'externalCommunication']);
        $builder->connect('/case-studies', ['controller' => 'Pages', 'action' => 'caseStudy']);
        $builder->connect('/podcast', ['controller' => 'Pages', 'action' => 'podcast']);
        $builder->connect('/services', ['controller' => 'Pages', 'action' => 'services']);
        $builder->connect('/remittance-seo', ['controller' => 'Pages', 'action' => 'accroSeo']);
        $builder->connect('/metier-seo-consulting', ['controller' => 'Pages', 'action' => 'metierSeoLanding']);
        $builder->connect('/disha-seo-consulting', ['controller' => 'Pages', 'action' => 'dishaSeoLanding']);

        $builder->connect('/thank-you-seo', ['controller' => 'Pages', 'action' => 'thankYouSeo']);
        $builder->connect('/career', ['controller' => 'Pages', 'action' => 'career']);
        $builder->connect('/data-driven', ['controller' => 'Pages', 'action' => 'dataDriven']);
        $builder->connect('/marketing-automation', ['controller' => 'Pages', 'action' => 'soumya']);
        $builder->connect('/data-engineering', ['controller' => 'Pages', 'action' => 'dataEngg']);

        $builder->connect('/blog-revops', ['controller' => 'Pages', 'action' => 'one']);
        $builder->connect('/blog-data-analytics', ['controller' => 'Pages', 'action' => 'two']);
        $builder->connect('/blog-sales-acceleration', ['controller' => 'Pages', 'action' => 'three']);
        $builder->connect('/blog-go-to-market', ['controller' => 'Pages', 'action' => 'four']);
        $builder->connect('/blog-automation', ['controller' => 'Pages', 'action' => 'five']);
        $builder->connect('/blog-product-engineering', ['controller' => 'Pages', 'action' => 'six']);
        $builder->connect('/blog-market-research', ['controller' => 'Pages', 'action' => 'seven']);



        // ------------------------------------Our Expertise -------------------------------------------------
        $builder->connect('/data-and-analytics', ['controller' => 'Pages', 'action' => 'dataAnalytics']);
        $builder->connect('/marketing-automation', ['controller' => 'Pages', 'action' => 'marketingAutomation']);
        $builder->connect('/revenue-operations', ['controller' => 'Pages', 'action' => 'revops']);
        $builder->connect('/product-engineering', ['controller' => 'Pages', 'action' => 'productEngineering']);
        $builder->connect('/financial-compliance', ['controller' => 'Pages', 'action' => 'financialCompliance']);
        $builder->connect('/digital-go-to-market', ['controller' => 'Pages', 'action' => 'gtm']);
        $builder->connect('/sales-acceleration-consulting', ['controller' => 'Pages', 'action' => 'salesAcceleration']);
        $builder->connect('/hr-research', ['controller' => 'Pages', 'action' => 'hrResearch']);
        $builder->connect('/real-estate-feasibility-research -', ['controller' => 'Pages', 'action' => 'realEstate']);

        //----------------------------------------------Blogs--------------------------------------------------------
        $builder->connect('/test', ['controller' => 'Blogs', 'action' => 'test']);

        $builder->connect('/knowledge-base', ['controller' => 'Blogs', 'action' => 'index']);
        $builder->connect('/knowledge-base-two', ['controller' => 'Blogs', 'action' => 'indexTwo']);
        $builder->connect('/knowledge-base-three', ['controller' => 'Blogs', 'action' => 'indexThree']);
        $builder->connect('/knowledge-base-four', ['controller' => 'Blogs', 'action' => 'indexFour']);

        $builder->connect('/blogs/leveraging_data_analytics_in_marketing', ['controller' => 'Blogs', 'action' => 'blogOne']);
        $builder->connect('/blogs/accelerating_careers_amplifying_skills', ['controller' => 'Blogs', 'action' => 'blogTwo']);
        $builder->connect('/blogs/navigating_the_B2B_marketing_landscape', ['controller' => 'Blogs', 'action' => 'blogThree']);
        $builder->connect('/blogs/just-beginning-to-explore/future-of-business-intelligence', ['controller' => 'Blogs', 'action' => 'futureOfBusinessIntelligence']);
        $builder->connect('/blogs/just-beginning-to-explore/external-communication-the-hidden-force-in-shaping-customer-perceptions-and-elevating-your-brand', ['controller' => 'Blogs', 'action' => 'externalCommunication']);
        $builder->connect('/blogs/becoming-aware-of-challenges/recognizing-and-overcoming-the-common-roadblocks-in-go-to-market-strategy-implementation', ['controller' => 'Blogs', 'action' => 'recognizingAndOvercoming']);
        $builder->connect('/blogs/just-beginning-to-explore/unraveling-the-basics-your-first-steps-toward-a-successful-go-to-market-strategy', ['controller' => 'Blogs', 'action' => 'unravelingTheBasics']);
        $builder->connect('/blogs/just-beginning-to-explore/how-poor-communication-can-hamper-your-business-success', ['controller' => 'Blogs', 'action' => 'poorCommunication']);
        $builder->connect('/blogs/exploring-potential-solutions/market-business-intelligence-a-game-changer-iin-b2b-lead-generation', ['controller' => 'Blogs', 'action' => 'marketBusinessIntelligence']);
        $builder->connect('/blogs/exploring-potential-solutions/leveraging-external-communication-a-comprehensive-solution-for-your-business', ['controller' => 'Blogs', 'action' => 'leveragingExternalCommunication']);
        $builder->connect('/blogs/exploring-potential-solutions/go-to-market-strategies-for-b2b-empowering-your-business-with-targeted-solutions', ['controller' => 'Blogs', 'action' => 'goToMarketStrategies']);
        $builder->connect('/blogs/fully-aware-and-ready-to-engage/elevating-b2b-external-communication-navigating-the-ready-to-engage-phase', ['controller' => 'Blogs', 'action' => 'elevatingExternalCommunication']);
        $builder->connect('/blogs/fully-aware-and-ready-to-engage/perfecting-your-b2b-go-to-market-strategy-engaging-with-precision-and-impact', ['controller' => 'Blogs', 'action' => 'engagingWithPrecisionAndImpact']);
        $builder->connect('/blogs/fully-aware-and-ready-to-engage/harnessing-market-business-intelligence-in-b2b-dive-deep-and-drive-engagement', ['controller' => 'Blogs', 'action' => 'diveDeepAndDriveEngagement']);
        $builder->connect('/blogs/becoming-aware-of-challenges/tackling-the-common-challenges-businesses-face-with-market-intelligence', ['controller' => 'Blogs', 'action' => 'tacklingTheCommonChallenges']);
        $builder->connect('/blogs/fully-aware-and-ready-to-engage/harnessing-market-business-intelligence-in-b2b-dive-deep-and-drive-engagement', ['controller' => 'Blogs', 'action' => 'diveDeepAndDriveEngagement']);
        $builder->connect('/blogs/just-beginning-to-explore/a-brief-introduction-to-sales-funnels-the-backbone-of-business-growth', ['controller' => 'Blogs', 'action' => 'backboneOfBusinessGrowth']);
        $builder->connect('/blogs/fully-aware-and-ready-to-engage/the-symbiotic-relationship-between-external-communication-market-intelligence-and-go-to-market-strategies-in-modern-b2b-engagements', ['controller' => 'Blogs', 'action' => 'symbioticRelationship']);
        $builder->connect('/new-market-entry-success', ['controller' => 'Blogs', 'action' => 'newMarketEntrySuccess']);
        $builder->connect('/leveraging-whats-app-channels', ['controller' => 'Blogs', 'action' => 'leveragingWhatsAppChannels']);
        $builder->connect('/major-obstacles-in-market-entry', ['controller' => 'Blogs', 'action' => 'majorObstaclesInMarketEntry']);
        $builder->connect('/data-driven-lead-generation-care', ['controller' => 'Blogs', 'action' => 'dataDrivenLeadGenerationCare']);
        $builder->connect('/common-pitfalls-in-traditional-lead-generation-strategies', ['controller' => 'Blogs', 'action' => 'commonPitfallsInTraditionalLeadGenerationStrategies']);
        $builder->connect('/data-analytics-can-revolutionize-your-lead-generation', ['controller' => 'Blogs', 'action' => 'dataAnalyticsCanRevolutionizeYourLeadGeneration']);
        $builder->connect('/implementing-a-successful-data-driven-lead-generation-strategy', ['controller' => 'Blogs', 'action' => 'implementingASuccessfulDataDrivenLeadGenerationStrategy']);
        $builder->connect('/mastering-the-art-of-external-communication', ['controller' => 'Blogs', 'action' => 'masteringTheArtOfExternalCommunication']);
        $builder->connect('/unlocking-the-mysteries-of-missed-marks', ['controller' => 'Blogs', 'action' => 'unlockingTheMysteriesOfMissedMarks']);
        $builder->connect('/modern-tools-and-techniques-for-enhanced-external-communication', ['controller' => 'Blogs', 'action' => 'modernToolsAndTechniquesForEnhancedExternalCommunication']);
        $builder->connect('/crafting-an-effective-external-communication-plan', ['controller' => 'Blogs', 'action' => 'craftingAnEffectiveExternalCommunicationPlan']);
        $builder->connect('/setting-the-stage-for-success', ['controller' => 'Blogs', 'action' => 'settingTheStageForSuccess']);
        $builder->connect('/top-mistakes-companies-make-when-launching-a-new-product-or-service', ['controller' => 'Blogs', 'action' => 'topMistakesCompaniesMakeWhenLaunchingANewProductOrService']);
        $builder->connect('/fine-tuning-your-go-to-market-strategy-with-real-world-examples', ['controller' => 'Blogs', 'action' => 'fineTuningYourGoToMarketStrategyWithRealWorldExamples']);
        $builder->connect('/blueprint-for-a-successful-go-to-market-launch', ['controller' => 'Blogs', 'action' => 'blueprintForASuccessfulGoToMarketLaunch']);
        $builder->connect('/key-steps-to-developing-a-successful-go-to-market-strategy-for-your-new-product', ['controller' => 'Blogs', 'action' => 'keyStepsToDevelopingASuccessfulGoToMarketStrategyForYourNewProduct']);
        $builder->connect('/how-to-measure-the-effectiveness-of-your-go-to-market-strategy', ['controller' => 'Blogs', 'action' => 'howToMeasureTheEffectivenessOfYourGoToMarketStrategy']);
        $builder->connect('/what-is-b-two-b-sales-how-it-differs-from-b-two-c', ['controller' => 'Blogs', 'action' => 'whatIsBTwoBSalesHowItDiffersFromBTwoC']);
        $builder->connect('/visual-communication-marketing-and-role-of-visual-designers', ['controller' => 'Blogs', 'action' => 'visualCommunicationMarketingAndRoleOfVisualDesigners']);
        $builder->connect('/b-two-b-content-marketing-strategy-step-by-step-guide', ['controller' => 'Blogs', 'action' => 'bTwoBContentMarketingStrategyStepByStepGuide']);
        $builder->connect('/content-marketing-examples-and-best-practices', ['controller' => 'Blogs', 'action' => 'contentMarketingExamplesAndBestPractices']);
        $builder->connect('/understanding-the-role-of-inside-sales-for-enterprises', ['controller' => 'Blogs', 'action' => 'understandingTheRoleOfInsideSalesForEnterprises']);
        $builder->connect('/enterprise-inside-sales-key-success-metrics', ['controller' => 'Blogs', 'action' => 'enterpriseInsideSalesKeySuccessMetrics']);
        $builder->connect('/how-to-optimize-your-website-for-better-search-visibility-the-power-of-meta-and-title-tags', ['controller' => 'Blogs', 'action' => 'howToOptimizeYourWebsiteForBetterSearch']);
        $builder->connect('/how-to-create-a-responsive-website-best-practices-for-mobile-friendly-seo', ['controller' => 'Blogs', 'action' => 'howToCreateAResponsiveWebsite']);
        $builder->connect('/when-to-update-your-seo-plan-key-signals-and-strategies-for-success', ['controller' => 'Blogs', 'action' => 'whenToUpdateYourSeoPlan']);
        $builder->connect('/maximizing-b-two-b-product-sales-through-your-website', ['controller' => 'Blogs', 'action' => 'maximizingBTwoBProductSales']);
        $builder->connect('/enhancing-product-sales-through-a-strategic-social-media-content-plan', ['controller' => 'Blogs', 'action' => 'enhancingProductSales']);
        $builder->connect('/key-differences-in-b-two-b-vs-b-two-c-sales',  ['controller' => 'Blogs', 'action' => 'keyDifferences']);
        $builder->connect('/the-importance-of-relationship-building-in-b-two-b-sales', ['controller' => 'Blogs', 'action' => 'theImportanceOfRelationship']);
        $builder->connect('/market-penetration-and-customer-feedback', ['controller' => 'Blogs', 'action' => 'marketPenetration']);
        $builder->connect('/roles-and-responsibilities-of-b-two-b-inside-sales-teams', ['controller' => 'Blogs', 'action' => 'rolesAndResponsibilities']);
        $builder->connect('/crafting-compelling-sales-content-captivating-strategies-for-engagement', ['controller' => 'Blogs', 'action' => 'craftingCompellingSalesContent']);
        $builder->connect('/here-are-five-ways-to-improve-web-traffic-for-businesses', ['controller' => 'Blogs', 'action' => 'waysToImproveWebTraffic']);
        $builder->connect('/crafting-a-winning-b-two-b-go-to-market-strategy', ['controller' => 'Blogs', 'action' => 'craftingAWinning']);
        $builder->connect('/digital-advertising-success-strategies', ['controller' => 'Blogs', 'action' => 'digitalAdvertisingSuccessStrategies']);
        $builder->connect('/crafting-an-irresistible-sales-pitch', ['controller' => 'Blogs', 'action' => 'craftingAnIrresistibleSalesPitch']);
        $builder->connect('/the-art-of-creating-buyer-personas',  ['controller' => 'Blogs', 'action' => 'theArtOfCreating']);
        $builder->connect('/becoming-a-pro-in-sales-negotiation',  ['controller' => 'Blogs', 'action' => 'becomingAPro']);
        $builder->connect('/a-dynamic-guide-to-agile-marketing', ['controller' => 'Blogs', 'action' => 'aDynamicGuide']);
        $builder->connect('/a-comprehensive-guide-to-local-seo', ['controller' => 'Blogs', 'action' => 'aComprehensiveGuide']);
        $builder->connect('/practical-guide-to-lead-generation-in-inside-sales', ['controller' => 'Blogs', 'action' => 'practicalGuideToLeadGeneration']);
        $builder->connect('/boosting-influence-and-reach', ['controller' => 'Blogs', 'action' => 'boostingInfluence']);
        $builder->connect('/using-social-selling-for-building-deeper-connections', ['controller' => 'Blogs', 'action' => 'usingSocialSelling']);

        $builder->connect('/a-personal-reflection-our-digital-odyssey-with-accropolix', ['controller' => 'SuccessStories', 'action' => 'aPersonalReflection']);
        $builder->connect('/a-founders-personal-account-our-digital-transformation-with-accropolix', ['controller' => 'SuccessStories', 'action' => 'aFounderPersonalAccount']);
        $builder->connect('/a-game-changing-partnership-how-deep-sales-approach-revitalized-our-sales-strategy', ['controller' => 'SuccessStories', 'action' => 'aGameChangingPartnership']);
        $builder->connect('/leveraging-content-marketing-to-drive-client-growth', ['controller' => 'SuccessStories', 'action' => 'leveragingContentMarketing']);
        $builder->connect('/inside-sales-revolution-a-strategic-partnership-with-accropolix', ['controller' => 'SuccessStories', 'action' => 'insideSalesRevolution']);
        $builder->connect('/triumph-in-sales-development-the-accropolix-strategy', ['controller' => 'SuccessStories', 'action' => 'triumphInSalesDevelopment']);

        $builder->connect('/mobile-seo-excellence-for-small-screens', ['controller' => 'Blogs', 'action' => 'mobileSeoExcellenceForSmallScreens']);
        $builder->connect('/efficient-inside-sales', ['controller' => 'Blogs', 'action' => 'efficientInsideSales']);
        $builder->connect('/audience-engagement-with-interactive-content-marketing', ['controller' => 'Blogs', 'action' => 'audienceEngagementWithInteractiveContentMarketing']);
        $builder->connect('/innovative-product-launch-strategies-for-a-powerful-gtm', ['controller' => 'Blogs', 'action' => 'innovativeProductLaunch']);
        $builder->connect('/voice-search-optimisation-in-the-conversational-era', ['controller' => 'Blogs', 'action' => 'voiceSearch']);
        $builder->connect('/data-analytics-in-inside-sales-optimisation', ['controller' => 'Blogs', 'action' => 'dataAnalyticsInsideSalesOptimisation']);
        $builder->connect('/content-repurposing-strategies-maximising-the-value-of-your-assets', ['controller' => 'Blogs', 'action' => 'contentRepurposing']);

        $builder->connect('/b2b-marketing', ['controller' => 'Blogs', 'action' => 'marketing']);
        $builder->connect('/b2b-sales-success', ['controller' => 'Blogs', 'action' => 'sales-success']);
        $builder->connect('/b2b-outreach', ['controller' => 'Blogs', 'action' => 'outreach']);
        $builder->connect('/b2b-marketing-funnel', ['controller' => 'Blogs', 'action' => 'marketingFunnel']);
        $builder->connect('/b2b-accelerate-sales-closure', ['controller' => 'Blogs', 'action' => 'accelerateSalesClosure']);
        $builder->connect('/seo-success-for-remittance', ['controller' => 'Blogs', 'action' => 'remittanceServices']);
        $builder->connect('/b2b-blog-index2', ['controller' => 'Blogs', 'action' => 'index2']);
        $builder->connect('/b2b-blog-revops', ['controller' => 'Blogs', 'action' => 'blogRevops']);
        $builder->connect('/b2b-blog-benefit-Trap', ['controller' => 'Blogs', 'action' => 'benefitTrap']);
        $builder->connect('/b2b-blog-intuition-vs-data', ['controller' => 'Blogs', 'action' => 'intuitionVsData']);
        $builder->connect('/b2b-DNA-of-great-products', ['controller' => 'Blogs', 'action' => 'beyondFeatures']);
        $builder->connect('/b2b-search-driven-consumer', ['controller' => 'Blogs', 'action' => 'searchDriven']);
        $builder->connect('/b2b-the-cost-of-non-compliance', ['controller' => 'Blogs', 'action' => 'nonCompliance']);
        $builder->connect('/b2b-building-a-data-fabric', ['controller' => 'Blogs', 'action' => 'buildingAData']);
        $builder->connect('/b2b-top-8-etl-tools', ['controller' => 'Blogs', 'action' => 'topTenTools']);
        $builder->connect('/b2b-top-five-guidelines', ['controller' => 'Blogs', 'action' => 'topFiveGuidelines']);
        $builder->connect('/b2b-strategic-hr-consulting', ['controller' => 'Blogs', 'action' => 'hrConsulting']);
        $builder->connect('/b2b-7-authentic-ways-to-build-relationships-with-prospects', ['controller' => 'Blogs', 'action' => 'authenticWays']);
        $builder->connect('/b2b-how-to-develop-a-winning-product-roadmap-best-practices-for-engineering-teams', ['controller' => 'Blogs', 'action' => 'winningProduct']);
        $builder->connect('/b2b-the-ultimate-guide-to-product-engineering-from-strategy-to-launch-success', ['controller' => 'Blogs', 'action' => 'guideProductEngg']);
        $builder->connect('/b2b-what-is-revenue-operations-and-why-is-it-essential', ['controller' => 'Blogs', 'action' => 'revenueOperations']);
        $builder->connect('/b2b-10-revOps-metrics-every-team-should-track-for-revenue-growth', ['controller' => 'Blogs', 'action' => 'revopsMetrics']);
        $builder->connect('/b2b-5-key-challenges-in-global-kyc-compliance-and-solutions-for-2024', ['controller' => 'Blogs', 'action' => 'fiveKeyChallenges']);
        $builder->connect('/b2b-why-agile-product-engineering-is-key-to-efficient-software-development', ['controller' => 'Blogs', 'action' => 'whyAgileProductEngg']);
        $builder->connect('/b2b-comprehensive-guide-to-pep-and-sanctioned-entity-screening-for-financial-crime-prevention-in-2024', ['controller' => 'Blogs', 'action' => 'comprehensiveGuide']);
        $builder->connect('/b2b-7-best-practices-for-creating-a-successful-marketing-automation-strategy-in-2024', ['controller' => 'Blogs', 'action' => 'sevenBestPractices']);
        $builder->connect('/b2b-5-proven-go-to-market-tactics-every-business-needs-in-2024', ['controller' => 'Blogs', 'action' => 'fiveProvenGtm']);
        $builder->connect('/b2b-how-ai-is-impacting-the-future-of-digital-marketing-in-2024', ['controller' => 'Blogs', 'action' => 'aiImpacting']);
        $builder->connect('/b2b-5-data-driven-hr-metrics-every-hr-professional-should-track', ['controller' => 'Blogs', 'action' => 'hrMetrics']);
        $builder->connect('/b2b-how-a-ai-powered-prescription-safety-app-secures', ['controller' => 'Blogs', 'action' => 'aiPoweredPrescription']);
        $builder->connect('/b2b-7-ways-predictive-analytics-is-changing-the-recruitment-process', ['controller' => 'Blogs', 'action' => 'predictiveAnalytics']);
        $builder->connect('/b2b-top-fifteen-open-source-data-engineering-tools-to-dominate', ['controller' => 'Blogs', 'action' => 'topFifteenOpen']);
        $builder->connect('/b2b-why-is-data-engineering-so-critical-for-artificial-intelligence', ['controller' => 'Blogs', 'action' => 'whyDataEngg']);


        $builder->connect('/discovery', ['controller' => 'process', 'action' => 'discovery']);
        $builder->connect('/strategy', ['controller' => 'process', 'action' => 'strategy']);
        $builder->connect('/implementation', ['controller' => 'process', 'action' => 'implementation']);
        $builder->connect('/analysis', ['controller' => 'process', 'action' => 'analysis']);
        $builder->fallbacks();

        $builder->fallbacks(DashedRoute::class);
        $builder->prefix('Admin', ['path' => '/administration'], function (RouteBuilder $builder) {
            $builder->scope('/', function (RouteBuilder $builder) {
                $builder->connect('/', ['controller' => 'Users', 'action' => 'login']);
                $builder->fallbacks();
            });
        });     
    });
};
