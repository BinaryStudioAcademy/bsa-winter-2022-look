import User from '@/bundles/common/entity/User';
import HttpTransport from '@/services/contracts/HttpTransport';
import UserRepository from '../contracts/UserRepository';
import UserRequest from '../requests/UserRequest';

export default class HttpUserRepository implements UserRepository {
  private readonly httpTransport: HttpTransport;

  constructor(httpTransport: HttpTransport) {
    this.httpTransport = httpTransport;
  }

  public create(payload: UserRequest): Promise<User> {
    return this.httpTransport
      .post(
        '/user',
        payload,
      );
  }
}
