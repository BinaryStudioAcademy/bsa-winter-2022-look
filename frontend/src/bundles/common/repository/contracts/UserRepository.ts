import User from '@/bundles/common/entity/User';
import UserRequest from '../requests/UserRequest';

export default interface UserRepository {
  /**
     * Create User
     *
     * @param {UserRequest} payload
     */
  create(payload: UserRequest): Promise<User>;
}
