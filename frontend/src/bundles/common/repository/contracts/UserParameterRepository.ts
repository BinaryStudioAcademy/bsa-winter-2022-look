import UserParameter from '@/bundles/common/entity/UserParameter';
import UserParameterRequest from '../requests/UserParameterRequest';

export default interface UserSettingRepository {
  /**
   * Create UserParameter
   *
   * @param {UserSettingRequest} payload
   */
  create(payload: UserParameterRequest): Promise<UserParameter>;
  /**
   * Get UserSettingRequest
   *
   */
  get(): Promise<UserParameter>;
  /**
   * Update UserSettingRequest
   */
  patch(payload: UserParameterRequest): Promise<UserParameter>;
}
