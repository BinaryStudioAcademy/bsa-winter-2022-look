import User from '@/bundles/common/entity/User';
import HttpTransport from '@/services/contracts/HttpTransport';
import UserRepository from '../contracts/UserRepository';
import UserLoginRequest from '../requests/UserLoginRequest';
import UserRequest from '../requests/UserRequest';

export default class HttpUserRepository implements UserRepository {
  private readonly httpTransport: HttpTransport;

  constructor(httpTransport: HttpTransport) {
    this.httpTransport = httpTransport;
  }

  public create(payload: UserRequest): Promise<User> {
    return this.httpTransport
      .post(
        '/auth/register ',
        payload,
      );
  }

  public login(payload: UserLoginRequest): Promise<void> {
    return this.httpTransport
      .post(
        '/auth/login',
        payload,
      );
  }

  public get(): Promise<User> {
    return this.httpTransport
      .get('/auth/me');
  }
}
