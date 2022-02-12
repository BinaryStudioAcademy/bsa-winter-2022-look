import User from '@/bundles/common/entity/User';
import UserLoginRequest from '../requests/UserLoginRequest';
import UserRequest from '../requests/UserRequest';
import ResetPasswordRequest from '../requests/ResetPasswordRequest';
import ChangePasswordRequest from '@/bundles/common/repository/requests/ChangePasswordRequest';

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
  /**
   * Reset password request
   *
   * @param {ResetPasswordRequest} payload
   */
  resetPassword(payload: ResetPasswordRequest): Promise<void>;
  /**
   * Change password request
   *
   * @param {ChangePasswordRequest} payload
   */
  changePassword(payload: ChangePasswordRequest): Promise<void>;
}
