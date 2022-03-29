import User from '@/bundles/common/entity/User';
import UserLoginRequest from '../requests/UserLoginRequest';
import UserRequest from '../requests/UserRequest';
import ChangePasswordRequest from '@/bundles/common/repository/requests/ChangePasswordRequest';
import ChangeUserInfoRequest from '@/bundles/common/repository/requests/ChangeUserInfoRequest';
import UsersListRequest from '@/bundles/common/repository/requests/UsersListRequest';

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
   * @param email
   */
  resetPassword(email: string): Promise<void>;
  /**
   * Change password request
   *
   * @param {ChangePasswordRequest} payload
   */
  changePassword(payload: ChangePasswordRequest): Promise<void>;
  /**
   * Email confirm request
   *
   * @param token
   */
  emailConfirmation(token: string): Promise<void>;
  /**
   * Email validation request
   *
   * @param email
   */
  sendValidationEmail(email: string): Promise<void>;
  /**
   * Get user additional info request
   *
   */
  getUserAdditionalInfo(): Promise<void>;
  /**
   * Change user info request
   *
   * @param {ChangeUserInfoRequest} payload
   */
  setUserAdditionalInfo(payload: ChangeUserInfoRequest): Promise<void>;
  /**
   * Change user info request
   *
   * @param {UsersListRequest} payload
   */
  getUsersList(payload: UsersListRequest): Promise<void>;
}
