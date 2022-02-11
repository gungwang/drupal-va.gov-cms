<?php

namespace tests\phpunit\Security;

use weitzman\DrupalTestTraits\ExistingSiteBase;
use Drupal\user\Entity\Role;

/**
 * A test to confirm that roles are associated with the correct permissions.
 */
class RolesPermissionsTest extends ExistingSiteBase {

  /**
   * Determine if each role has the expected permissions.
   *
   * @group security
   * @group all
   *
   * @dataProvider expectedPerms
   */
  public function testSecurityRolesPermissions($roleMatch, $expectedPerms) {
    $role = Role::load($roleMatch);
    $permissions = NULL;

    if (isset($role)) {
      $permissions = $role->getPermissions();
      $message = "The permissions for the " . $roleMatch . " do not match the expected permissions.  Make the expected look like this, to get the test passing: \n '" . implode("',\n '", $permissions) . "',\n";
    }
    else {
      $message = 'The ' . $roleMatch . ' role is missing from the system.';
    }

    // Test assertion.
    $match = ($expectedPerms == $permissions);

    $this->assertTrue($match, $message);
  }

  /**
   * Returns expected roles and associated permissions.
   *
   * @return array
   *   Array containing all the roles in the system as an array
   */
  public function expectedPerms() {
    return [
      [
        'anonymous',
        [
          'access content',
          'access prometheus metrics',
          'view media',
          'view style guides',
        ],
      ],
      [
        'authenticated',
        [
          'access alert_blocks entity browser pages',
          'access audiences_checkboxes entity browser pages',
          'access benefit_hub_contact_information entity browser pages',
          'access categories entity browser pages',
          'access content',
          'access downloadable_resources entity browser pages',
          'access environment indicator',
          'access events_browser entity browser pages',
          'access lc_benefit_hubs entity browser pages',
          'access media entity browser pages',
          'access mobile_vet_centers entity browser pages',
          'access promo_blocks_browser entity browser pages',
          'access q_a_browser entity browser pages',
          'access toolbar',
          'add user_history entities',
          'enter all revision log entry',
          'execute graphql requests',
          'execute persisted graphql requests',
          'override all revision option',
          'override event authored on option',
          'override full_width_banner_alert published option',
          'override news_story authored on option',
          'override outreach_asset authored on option',
          'override press_release authored on option',
          'use workbench access',
          'view media',
          'view style guides',
        ],
      ],
      [
        'content_admin',
        [
          'access administration pages',
          'access files overview',
          'access media overview',
          'access taxonomy overview',
          'access user profiles',
          'access vamc_operating_statuses entity browser pages',
          'administer menu',
          'administer nodes',
          'administer taxonomy',
          'break content lock',
          'bypass node access',
          'bypass workbench access',
          'cancel smart date recur instances',
          'clone block entity',
          'clone block_content entity',
          'clone field_config entity',
          'clone file entity',
          'clone media entity',
          'clone menu entity',
          'clone node entity',
          'clone paragraph entity',
          'create alert block content',
          'create promo block content',
          'create url aliases',
          'create vamc_system_billing_insurance content',
          'create vamc_system_medical_records_offi content',
          'create vamc_system_register_for_care content',
          'delete alert revisions',
          'delete all block content revisions',
          'delete all media revisions',
          'delete document revisions',
          'delete document_external revisions',
          'delete image revisions',
          'delete promo revisions',
          'delete video revisions',
          'execute entity:break_lock node',
          'execute publish_latest_revision_action node',
          'execute views_bulk_edit all',
          'export tablefield',
          'import tablefield',
          'link to any page',
          'make smart dates recur',
          'manipulate all entityqueues',
          'manipulate entityqueues',
          'notify of path changes',
          'override all authored by option',
          'rebuild tablefield',
          'reschedule smart date recur instances',
          'revert alert revisions',
          'revert all block content revisions',
          'revert all media revisions',
          'revert all taxonomy term revisions',
          'revert document_external revisions',
          'revert image revisions',
          'revert promo revisions',
          'revert video revisions',
          'unflag changed_filename',
          'unflag changed_name',
          'unflag changed_title',
          'unflag deleted',
          'unflag new',
          'unflag new_form',
          'unflag removed_from_source',
          'update any alert block content',
          'update any media',
          'update any promo block content',
          'update media',
          'use editorial transition approve',
          'use editorial transition archive',
          'use editorial transition archived_published',
          'use editorial transition create_new_draft',
          'use editorial transition publish',
          'use editorial transition review',
          'use text format rich_text',
          'use text format rich_text_limited',
          'use workbench access',
          'va gov deploy content build',
          'view alert revisions',
          'view all block content revisions',
          'view all media revisions',
          'view all taxonomy term revisions',
          'view any unpublished content',
          'view document revisions',
          'view document_external revisions',
          'view image revisions',
          'view latest version',
          'view node link report',
          'view promo revisions',
          'view sections in toolbar',
          'view the administration theme',
          'view unpublished paragraphs',
          'view video revisions',
          'view workbench access information',
        ],
      ],
      [
        'content_api_consumer',
        [
          'access bulletin queue trigger api',
          'access openapi api docs',
          'bypass graphql field security',
          'use graphql explorer',
          'use graphql voyager',
          'va gov graphql read menu content',
          'view any unpublished content',
          'view own unpublished content',
        ],
      ],
      [
        'content_creator_benefits_hubs',
        [
          'access files overview',
          'create landing_page content',
          'create page content',
          'create promo block content',
          'create support_service content',
          'view node link report',
        ],
      ],
      [
        'content_creator_resources_and_support',
        [
          'access files overview',
          'create checklist content',
          'create faq_multiple_q_a content',
          'create media_list_images content',
          'create media_list_videos content',
          'create promo block content',
          'create q_a content',
          'create step_by_step content',
          'create support_resources_detail_page content',
          'view node link report',
        ],
      ],
      [
        'content_creator_vet_center',
        [
          'create vet_center_cap content',
          'create vet_center_facility_health_servi content',
          'view node link report',
        ],
      ],
      [
        'content_editor',
        [
          'access administration pages',
          'access content overview',
          'access files overview',
          'access media overview',
          'access user profiles',
          'administer menu',
          'break content lock',
          'cancel smart date recur instances',
          'create alert block content',
          'create document media',
          'create image media',
          'create media',
          'create promo block content',
          'create video media',
          'edit any banner content',
          'edit any basic_landing_page content',
          'edit any campaign_landing_page content',
          'edit any centralized_content content',
          'edit any checklist content',
          'edit any document media',
          'edit any document_external media',
          'edit any documentation_page content',
          'edit any event content',
          'edit any event_listing content',
          'edit any faq_multiple_q_a content',
          'edit any full_width_banner_alert content',
          'edit any health_care_local_facility content',
          'edit any health_care_local_health_service content',
          'edit any health_care_region_detail_page content',
          'edit any health_care_region_page content',
          'edit any health_services_listing content',
          'edit any image media',
          'edit any landing_page content',
          'edit any leadership_listing content',
          'edit any locations_listing content',
          'edit any media_list_images content',
          'edit any media_list_videos content',
          'edit any nca_facility content',
          'edit any news_story content',
          'edit any office content',
          'edit any outreach_asset content',
          'edit any page content',
          'edit any person_profile content',
          'edit any press_release content',
          'edit any press_releases_listing content',
          'edit any promo_banner content',
          'edit any publication_listing content',
          'edit any q_a content',
          'edit any regional_health_care_service_des content',
          'edit any step_by_step content',
          'edit any story_listing content',
          'edit any support_resources_detail_page content',
          'edit any support_service content',
          'edit any va_form content',
          'edit any vamc_operating_status_and_alerts content',
          'edit any vamc_system_billing_insurance content',
          'edit any vamc_system_medical_records_offi content',
          'edit any vamc_system_policies_page content',
          'edit any vamc_system_register_for_care content',
          'edit any vba_facility content',
          'edit any vet_center content',
          'edit any vet_center_cap content',
          'edit any vet_center_facility_health_servi content',
          'edit any vet_center_locations_list content',
          'edit any vet_center_mobile_vet_center content',
          'edit any vet_center_outstation content',
          'edit any video media',
          'execute entity:break_lock node',
          'make smart dates recur',
          'notify of path changes',
          'rebuild tablefield',
          'reschedule smart date recur instances',
          'revert alert revisions',
          'revert document revisions',
          'revert document_external revisions',
          'revert image revisions',
          'revert promo revisions',
          'revert video revisions',
          'update any alert block content',
          'update any media',
          'update any promo block content',
          'update media',
          'use editorial transition create_new_draft',
          'use editorial transition review',
          'use text format rich_text',
          'use text format rich_text_limited',
          'use workbench access',
          'view alert revisions',
          'view all block content revisions',
          'view all media revisions',
          'view any unpublished content',
          'view banner revisions',
          'view basic_landing_page revisions',
          'view campaign_landing_page revisions',
          'view centralized_content revisions',
          'view checklist revisions',
          'view document revisions',
          'view document_external revisions',
          'view event revisions',
          'view event_listing revisions',
          'view faq_multiple_q_a revisions',
          'view full_width_banner_alert revisions',
          'view health_care_local_facility revisions',
          'view health_care_local_health_service revisions',
          'view health_care_region_detail_page revisions',
          'view health_care_region_page revisions',
          'view health_services_listing revisions',
          'view image revisions',
          'view landing_page revisions',
          'view latest version',
          'view leadership_listing revisions',
          'view locations_listing revisions',
          'view media_list_images revisions',
          'view media_list_videos revisions',
          'view nca_facility revisions',
          'view news_story revisions',
          'view node link report',
          'view office revisions',
          'view outreach_asset revisions',
          'view own unpublished content',
          'view page revisions',
          'view person_profile revisions',
          'view press_release revisions',
          'view press_releases_listing revisions',
          'view promo revisions',
          'view promo_banner revisions',
          'view publication_listing revisions',
          'view q_a revisions',
          'view regional_health_care_service_des revisions',
          'view sections in toolbar',
          'view step_by_step revisions',
          'view story_listing revisions',
          'view support_resources_detail_page revisions',
          'view support_service revisions',
          'view the administration theme',
          'view unpublished paragraphs',
          'view va_form revisions',
          'view vamc_operating_status_and_alerts revisions',
          'view vamc_system_billing_insurance revisions',
          'view vamc_system_medical_records_offi revisions',
          'view vamc_system_policies_page revisions',
          'view vamc_system_register_for_care revisions',
          'view vba_facility revisions',
          'view vet_center revisions',
          'view vet_center_cap revisions',
          'view vet_center_facility_health_servi revisions',
          'view vet_center_locations_list revisions',
          'view vet_center_mobile_vet_center revisions',
          'view vet_center_outstation revisions',
          'view vha_facility_nonclinical_service revisions',
          'view video revisions',
          'view workbench access information',
        ],
      ],
      [
        'content_reviewer',
        [
          'access administration pages',
          'access content overview',
          'access files overview',
          'access media overview',
          'access user profiles',
          'administer menu',
          'break content lock',
          'cancel smart date recur instances',
          'create alert block content',
          'create document media',
          'create image media',
          'create media',
          'create promo block content',
          'create video media',
          'edit any banner content',
          'edit any basic_landing_page content',
          'edit any campaign_landing_page content',
          'edit any centralized_content content',
          'edit any checklist content',
          'edit any document media',
          'edit any document_external media',
          'edit any documentation_page content',
          'edit any event content',
          'edit any event_listing content',
          'edit any faq_multiple_q_a content',
          'edit any full_width_banner_alert content',
          'edit any health_care_local_facility content',
          'edit any health_care_local_health_service content',
          'edit any health_care_region_detail_page content',
          'edit any health_care_region_page content',
          'edit any health_services_listing content',
          'edit any image media',
          'edit any landing_page content',
          'edit any leadership_listing content',
          'edit any locations_listing content',
          'edit any media_list_images content',
          'edit any media_list_videos content',
          'edit any nca_facility content',
          'edit any news_story content',
          'edit any office content',
          'edit any outreach_asset content',
          'edit any page content',
          'edit any person_profile content',
          'edit any press_release content',
          'edit any press_releases_listing content',
          'edit any promo_banner content',
          'edit any publication_listing content',
          'edit any q_a content',
          'edit any regional_health_care_service_des content',
          'edit any step_by_step content',
          'edit any story_listing content',
          'edit any support_resources_detail_page content',
          'edit any support_service content',
          'edit any va_form content',
          'edit any vamc_operating_status_and_alerts content',
          'edit any vamc_system_billing_insurance content',
          'edit any vamc_system_medical_records_offi content',
          'edit any vamc_system_policies_page content',
          'edit any vamc_system_register_for_care content',
          'edit any vba_facility content',
          'edit any vet_center content',
          'edit any vet_center_cap content',
          'edit any vet_center_facility_health_servi content',
          'edit any vet_center_locations_list content',
          'edit any vet_center_mobile_vet_center content',
          'edit any vet_center_outstation content',
          'edit any video media',
          'execute entity:break_lock node',
          'make smart dates recur',
          'notify of path changes',
          'rebuild tablefield',
          'reschedule smart date recur instances',
          'update any alert block content',
          'update any media',
          'update any promo block content',
          'update media',
          'use editorial transition approve',
          'use editorial transition create_new_draft',
          'use editorial transition review',
          'use text format rich_text',
          'use text format rich_text_limited',
          'use workbench access',
          'view alert revisions',
          'view all block content revisions',
          'view all media revisions',
          'view any unpublished content',
          'view banner revisions',
          'view basic_landing_page revisions',
          'view campaign_landing_page revisions',
          'view centralized_content revisions',
          'view checklist revisions',
          'view document revisions',
          'view document_external revisions',
          'view event revisions',
          'view event_listing revisions',
          'view faq_multiple_q_a revisions',
          'view full_width_banner_alert revisions',
          'view health_care_local_facility revisions',
          'view health_care_local_health_service revisions',
          'view health_care_region_detail_page revisions',
          'view health_care_region_page revisions',
          'view health_services_listing revisions',
          'view image revisions',
          'view landing_page revisions',
          'view latest version',
          'view leadership_listing revisions',
          'view locations_listing revisions',
          'view media_list_images revisions',
          'view media_list_videos revisions',
          'view nca_facility revisions',
          'view news_story revisions',
          'view node link report',
          'view office revisions',
          'view outreach_asset revisions',
          'view own unpublished content',
          'view page revisions',
          'view person_profile revisions',
          'view press_release revisions',
          'view press_releases_listing revisions',
          'view promo revisions',
          'view promo_banner revisions',
          'view publication_listing revisions',
          'view q_a revisions',
          'view regional_health_care_service_des revisions',
          'view sections in toolbar',
          'view step_by_step revisions',
          'view story_listing revisions',
          'view support_resources_detail_page revisions',
          'view support_service revisions',
          'view the administration theme',
          'view unpublished paragraphs',
          'view va_form revisions',
          'view vamc_operating_status_and_alerts revisions',
          'view vamc_system_billing_insurance revisions',
          'view vamc_system_medical_records_offi revisions',
          'view vamc_system_policies_page revisions',
          'view vamc_system_register_for_care revisions',
          'view vba_facility revisions',
          'view vet_center revisions',
          'view vet_center_cap revisions',
          'view vet_center_facility_health_servi revisions',
          'view vet_center_locations_list revisions',
          'view vet_center_mobile_vet_center revisions',
          'view vet_center_outstation revisions',
          'view vha_facility_nonclinical_service revisions',
          'view video revisions',
          'view workbench access information',
        ],
      ],
      [
        'content_publisher',
        [
          'access administration pages',
          'access content overview',
          'access files overview',
          'access media overview',
          'access user profiles',
          'administer menu',
          'break content lock',
          'cancel smart date recur instances',
          'create alert block content',
          'create document media',
          'create image media',
          'create media',
          'create promo block content',
          'create video media',
          'edit any banner content',
          'edit any basic_landing_page content',
          'edit any campaign_landing_page content',
          'edit any centralized_content content',
          'edit any checklist content',
          'edit any document media',
          'edit any document_external media',
          'edit any documentation_page content',
          'edit any event content',
          'edit any event_listing content',
          'edit any faq_multiple_q_a content',
          'edit any full_width_banner_alert content',
          'edit any health_care_local_facility content',
          'edit any health_care_local_health_service content',
          'edit any health_care_region_detail_page content',
          'edit any health_care_region_page content',
          'edit any health_services_listing content',
          'edit any image media',
          'edit any landing_page content',
          'edit any leadership_listing content',
          'edit any locations_listing content',
          'edit any media_list_images content',
          'edit any media_list_videos content',
          'edit any nca_facility content',
          'edit any news_story content',
          'edit any office content',
          'edit any outreach_asset content',
          'edit any page content',
          'edit any person_profile content',
          'edit any press_release content',
          'edit any press_releases_listing content',
          'edit any promo_banner content',
          'edit any publication_listing content',
          'edit any q_a content',
          'edit any regional_health_care_service_des content',
          'edit any step_by_step content',
          'edit any story_listing content',
          'edit any support_resources_detail_page content',
          'edit any support_service content',
          'edit any va_form content',
          'edit any vamc_operating_status_and_alerts content',
          'edit any vamc_system_billing_insurance content',
          'edit any vamc_system_medical_records_offi content',
          'edit any vamc_system_policies_page content',
          'edit any vamc_system_register_for_care content',
          'edit any vba_facility content',
          'edit any vet_center content',
          'edit any vet_center_cap content',
          'edit any vet_center_facility_health_servi content',
          'edit any vet_center_locations_list content',
          'edit any vet_center_mobile_vet_center content',
          'edit any vet_center_outstation content',
          'execute entity:break_lock node',
          'execute publish_latest_revision_action node',
          'make smart dates recur',
          'notify of path changes',
          'rebuild tablefield',
          'reschedule smart date recur instances',
          'revert alert revisions',
          'revert all block content revisions',
          'revert all media revisions',
          'revert all revisions',
          'revert banner revisions',
          'revert basic_landing_page revisions',
          'revert campaign_landing_page revisions',
          'revert centralized_content revisions',
          'revert checklist revisions',
          'revert document revisions',
          'revert document_external revisions',
          'revert documentation_page revisions',
          'revert event revisions',
          'revert event_listing revisions',
          'revert faq_multiple_q_a revisions',
          'revert full_width_banner_alert revisions',
          'revert health_care_local_facility revisions',
          'revert health_care_local_health_service revisions',
          'revert health_care_region_detail_page revisions',
          'revert health_care_region_page revisions',
          'revert health_services_listing revisions',
          'revert image revisions',
          'revert landing_page revisions',
          'revert leadership_listing revisions',
          'revert locations_listing revisions',
          'revert media_list_images revisions',
          'revert media_list_videos revisions',
          'revert nca_facility revisions',
          'revert news_story revisions',
          'revert office revisions',
          'revert outreach_asset revisions',
          'revert page revisions',
          'revert person_profile revisions',
          'revert press_release revisions',
          'revert press_releases_listing revisions',
          'revert promo revisions',
          'revert promo_banner revisions',
          'revert publication_listing revisions',
          'revert q_a revisions',
          'revert regional_health_care_service_des revisions',
          'revert step_by_step revisions',
          'revert story_listing revisions',
          'revert support_resources_detail_page revisions',
          'revert support_service revisions',
          'revert va_form revisions',
          'revert vamc_operating_status_and_alerts revisions',
          'revert vamc_system_billing_insurance revisions',
          'revert vamc_system_medical_records_offi revisions',
          'revert vamc_system_policies_page revisions',
          'revert vamc_system_register_for_care revisions',
          'revert vba_facility revisions',
          'revert vet_center revisions',
          'revert vet_center_cap revisions',
          'revert vet_center_facility_health_servi revisions',
          'revert vet_center_locations_list revisions',
          'revert vet_center_mobile_vet_center revisions',
          'revert vet_center_outstation revisions',
          'revert vha_facility_nonclinical_service revisions',
          'revert video revisions',
          'unflag changed_filename',
          'unflag changed_title',
          'unflag deleted',
          'unflag new_form',
          'update any alert block content',
          'update any media',
          'update any promo block content',
          'update media',
          'use editorial transition approve',
          'use editorial transition archive',
          'use editorial transition archived_published',
          'use editorial transition create_new_draft',
          'use editorial transition publish',
          'use editorial transition review',
          'use text format rich_text',
          'use text format rich_text_limited',
          'use workbench access',
          'view alert revisions',
          'view all block content revisions',
          'view all media revisions',
          'view any unpublished content',
          'view banner revisions',
          'view basic_landing_page revisions',
          'view campaign_landing_page revisions',
          'view centralized_content revisions',
          'view checklist revisions',
          'view document revisions',
          'view document_external revisions',
          'view event revisions',
          'view event_listing revisions',
          'view faq_multiple_q_a revisions',
          'view full_width_banner_alert revisions',
          'view health_care_local_facility revisions',
          'view health_care_local_health_service revisions',
          'view health_care_region_detail_page revisions',
          'view health_care_region_page revisions',
          'view health_services_listing revisions',
          'view image revisions',
          'view landing_page revisions',
          'view latest version',
          'view leadership_listing revisions',
          'view locations_listing revisions',
          'view media_list_images revisions',
          'view media_list_videos revisions',
          'view nca_facility revisions',
          'view news_story revisions',
          'view node link report',
          'view office revisions',
          'view outreach_asset revisions',
          'view own unpublished content',
          'view page revisions',
          'view person_profile revisions',
          'view press_release revisions',
          'view press_releases_listing revisions',
          'view promo revisions',
          'view promo_banner revisions',
          'view publication_listing revisions',
          'view q_a revisions',
          'view regional_health_care_service_des revisions',
          'view sections in toolbar',
          'view step_by_step revisions',
          'view story_listing revisions',
          'view support_resources_detail_page revisions',
          'view support_service revisions',
          'view the administration theme',
          'view unpublished paragraphs',
          'view va_form revisions',
          'view vamc_operating_status_and_alerts revisions',
          'view vamc_system_billing_insurance revisions',
          'view vamc_system_medical_records_offi revisions',
          'view vamc_system_policies_page revisions',
          'view vamc_system_register_for_care revisions',
          'view vba_facility revisions',
          'view vet_center revisions',
          'view vet_center_cap revisions',
          'view vet_center_facility_health_servi revisions',
          'view vet_center_locations_list revisions',
          'view vet_center_mobile_vet_center revisions',
          'view vet_center_outstation revisions',
          'view vha_facility_nonclinical_service revisions',
          'view video revisions',
          'view workbench access information',
        ],
      ],
      [
        'admnistrator_users',
        [
          'administer users',
          'assign content_admin role',
          'assign content_api_consumer role',
          'assign content_creator_benefits_hubs role',
          'assign content_creator_resources_and_support role',
          'assign content_creator_vet_center role',
          'assign content_editor role',
          'assign content_publisher role',
          'assign content_reviewer role',
          'assign office_content_creator role',
          'assign redirect_administrator role',
          'assign selected workbench access',
          'assign vamc_content_creator role',
          'bypass workbench access',
          'create terms in administration',
          'delete terms in administration',
          'edit terms in administration',
          'execute user_add_role_action user',
          'manage password reset',
          'use text format rich_text',
          'use text format rich_text_limited',
          'view node link report',
          'view sections in toolbar',
          'view the administration theme',
          'view workbench access information',
        ],
      ],
      [
        'office_content_creator',
        [
          'access files overview',
          'create event content',
          'create outreach_asset content',
          'create promo block content',
          'view node link report',
        ],
      ],
      [
        'vamc_content_creator',
        [
          'access files overview',
          'create event content',
          'create full_width_banner_alert content',
          'create health_care_local_health_service content',
          'create health_care_region_detail_page content',
          'create news_story content',
          'create person_profile content',
          'create press_release content',
          'create promo block content',
          'create regional_health_care_service_des content',
          'view node link report',
        ],
      ],
    ];
  }

}
