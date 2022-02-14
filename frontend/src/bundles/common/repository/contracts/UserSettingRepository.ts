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
   * Get UserSetting
   *
   */
  get(): Promise<UserSetting>;
  /**
   * Update UserSetting
   */
  patch(payload: UserSettingRequest): Promise<UserSetting>;
}
