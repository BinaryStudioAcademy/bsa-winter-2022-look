import UserParameter from '@/bundles/common/entity/UserParameter';
import UserParameterRequest from '../requests/UserParameterRequest';

export default interface UserParameterRepository {
  /**
   * Create UserParameter
   *
   * @param {UserParameterRequest} payload
   */
  create(payload: UserParameterRequest): Promise<UserParameter>;
  /**
   * Get UserParameter
   *
   */
  get(): Promise<UserParameter>;
  /**
   * Update UserParameter
   */
  patch(payload: UserParameterRequest): Promise<UserParameter>;
}
