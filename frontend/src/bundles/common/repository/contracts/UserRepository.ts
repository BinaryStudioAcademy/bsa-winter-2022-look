import User from '@/bundles/common/entity/User';
import UserLoginRequest from '../requests/UserLoginRequest';
import UserRequest from '../requests/UserRequest';
import ResetPasswordRequest from '../requests/ResetPasswordRequest';

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
   * Reset password request
   *
   * @param {ResetPasswordRequest} payload
   */
  resetPassword(payload: ResetPasswordRequest): Promise<void>;
}
