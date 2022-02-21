import User from '@/bundles/common/entity/User';
import UserLoginRequest from '../requests/UserLoginRequest';
import UserRequest from '../requests/UserRequest';

export default interface UserRepository {
  /**
     * Create User
     *
     * @param {UserRequest} payload
     */
  create(payload: UserRequest): Promise<User>;
  /**
     * Login User
     *
     * @param {UserLoginRequest} payload
     */
  login(payload: UserLoginRequest): Promise<void>;
  /**
     * Get User
     *
     */
  get(): Promise<User>;
  /**
   * TODO: setup endpoint api after api done
   */
  patch(payload: any): Promise<any>
}
