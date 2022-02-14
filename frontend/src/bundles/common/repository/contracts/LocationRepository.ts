import Location from '@/bundles/common/entity/Location';
import LocationRequest from '../requests/LocationRequest';

export default interface LocationRepository {
  /**
   * Set Location
   *
   * @param {LocationRequest} payload
   */
  create(payload: LocationRequest): Promise<Location>;
  /**
   * Get Location
   *
   */
  get(): Promise<Location>;
  /**
   * Update Location
   */
  patch(payload: LocationRequest): Promise<Location>;
}
