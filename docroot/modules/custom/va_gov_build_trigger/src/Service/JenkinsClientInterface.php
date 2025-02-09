<?php

namespace Drupal\va_gov_build_trigger\Service;

/**
 * A client for interfacing with Jenkins.
 */
interface JenkinsClientInterface {

  /**
   * Request a front end build.
   *
   * @param string $frontendGitRef
   *   The git ref of the frontend.
   *
   * @throws \Drupal\va_gov_build_trigger\Exception\JenkinsClientException
   */
  public function requestFrontendBuild(string $frontendGitRef = NULL): void;

}
