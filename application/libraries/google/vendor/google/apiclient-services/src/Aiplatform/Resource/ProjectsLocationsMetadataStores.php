<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Aiplatform\Resource;

use Google\Service\Aiplatform\GoogleCloudAiplatformV1ListMetadataStoresResponse;
use Google\Service\Aiplatform\GoogleCloudAiplatformV1MetadataStore;
use Google\Service\Aiplatform\GoogleLongrunningOperation;

/**
 * The "metadataStores" collection of methods.
 * Typical usage is:
 *  <code>
 *   $aiplatformService = new Google\Service\Aiplatform(...);
 *   $metadataStores = $aiplatformService->projects_locations_metadataStores;
 *  </code>
 */
class ProjectsLocationsMetadataStores extends \Google\Service\Resource
{
  /**
   * Initializes a MetadataStore, including allocation of resources.
   * (metadataStores.create)
   *
   * @param string $parent Required. The resource name of the Location where the
   * MetadataStore should be created. Format:
   * `projects/{project}/locations/{location}/`
   * @param GoogleCloudAiplatformV1MetadataStore $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string metadataStoreId The {metadatastore} portion of the resource
   * name with the format:
   * `projects/{project}/locations/{location}/metadataStores/{metadatastore}` If
   * not provided, the MetadataStore's ID will be a UUID generated by the service.
   * Must be 4-128 characters in length. Valid characters are `/a-z-/`. Must be
   * unique across all MetadataStores in the parent Location. (Otherwise the
   * request will fail with ALREADY_EXISTS, or PERMISSION_DENIED if the caller
   * can't view the preexisting MetadataStore.)
   * @return GoogleLongrunningOperation
   * @throws \Google\Service\Exception
   */
  public function create($parent, GoogleCloudAiplatformV1MetadataStore $postBody, $optParams = [])
  {
    $params = ['parent' => $parent, 'postBody' => $postBody];
    $params = array_merge($params, $optParams);
    return $this->call('create', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Deletes a single MetadataStore and all its child resources (Artifacts,
   * Executions, and Contexts). (metadataStores.delete)
   *
   * @param string $name Required. The resource name of the MetadataStore to
   * delete. Format:
   * `projects/{project}/locations/{location}/metadataStores/{metadatastore}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param bool force Deprecated: Field is no longer supported.
   * @return GoogleLongrunningOperation
   * @throws \Google\Service\Exception
   */
  public function delete($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('delete', [$params], GoogleLongrunningOperation::class);
  }
  /**
   * Retrieves a specific MetadataStore. (metadataStores.get)
   *
   * @param string $name Required. The resource name of the MetadataStore to
   * retrieve. Format:
   * `projects/{project}/locations/{location}/metadataStores/{metadatastore}`
   * @param array $optParams Optional parameters.
   * @return GoogleCloudAiplatformV1MetadataStore
   * @throws \Google\Service\Exception
   */
  public function get($name, $optParams = [])
  {
    $params = ['name' => $name];
    $params = array_merge($params, $optParams);
    return $this->call('get', [$params], GoogleCloudAiplatformV1MetadataStore::class);
  }
  /**
   * Lists MetadataStores for a Location.
   * (metadataStores.listProjectsLocationsMetadataStores)
   *
   * @param string $parent Required. The Location whose MetadataStores should be
   * listed. Format: `projects/{project}/locations/{location}`
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of Metadata Stores to return. The
   * service may return fewer. Must be in range 1-1000, inclusive. Defaults to
   * 100.
   * @opt_param string pageToken A page token, received from a previous
   * MetadataService.ListMetadataStores call. Provide this to retrieve the
   * subsequent page. When paginating, all other provided parameters must match
   * the call that provided the page token. (Otherwise the request will fail with
   * INVALID_ARGUMENT error.)
   * @return GoogleCloudAiplatformV1ListMetadataStoresResponse
   * @throws \Google\Service\Exception
   */
  public function listProjectsLocationsMetadataStores($parent, $optParams = [])
  {
    $params = ['parent' => $parent];
    $params = array_merge($params, $optParams);
    return $this->call('list', [$params], GoogleCloudAiplatformV1ListMetadataStoresResponse::class);
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ProjectsLocationsMetadataStores::class, 'Google_Service_Aiplatform_Resource_ProjectsLocationsMetadataStores');
