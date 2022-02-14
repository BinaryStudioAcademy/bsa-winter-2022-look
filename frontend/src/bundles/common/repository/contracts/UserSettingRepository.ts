import UserSetting from '@/bundles/common/entity/UserSetting';
import UserSettingRequest from '../requests/UserSettingRequest';

export default interface UserSettingRepository {
  /**
   * Create UserSetting
   *
   * @param {UserSettingRequest} payload
   */
  create(payload: UserSettingRequest): Promise<UserSetting>;
  /**
   * Get UserSettingRequest
   *
   */
  get(): Promise<UserSetting>;
  /**
   * Update UserSettingRequest
   */
  patch(payload: UserSettingRequest): Promise<UserSetting>;
}
