import Profile from '@/bundles/common/entity/Profile';
import ProfileRequest from '../requests/ProfileRequest';

export default interface ProfileRepository {
  /**
     * Create Profile
     *
     * @param {ProfileRequest} payload
     */
  create(payload: ProfileRequest): Promise<Profile>;

}
