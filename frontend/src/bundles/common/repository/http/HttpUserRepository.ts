import User from '@/bundles/common/entity/User';
import HttpTransport from '@/services/contracts/HttpTransport';
import UserRepository from '../contracts/UserRepository';
import UserLoginRequest from '../requests/UserLoginRequest';
import UserRequest from '../requests/UserRequest';
import Storage from '@/services/storage';
import ChangePasswordRequest from '@/bundles/common/repository/requests/ChangePasswordRequest';

export default class HttpUserRepository implements UserRepository {
  private readonly httpTransport: HttpTransport;

  constructor(httpTransport: HttpTransport) {
    this.httpTransport = httpTransport;
  }

  public create(payload: UserRequest): Promise<User> {
    return this.httpTransport
      .post(
        '/auth/register',
        payload,
      );
  }

  /**
   * TODO: setup endpoint api after api done
   */
  public patch(payload: any): Promise<any> {
    console.log(payload);
    return new Promise(resolve => resolve({}));
  }

  public login(payload: UserLoginRequest): Promise<void> {
    return this.httpTransport
      .post(
        '/auth/login',
        payload,
      ).then(({
        access_token: accessToken,
        token_type: tokenType,
      }) => {
        Storage.setToken(accessToken);
        Storage.setTokenType(tokenType);
      });
  }

  public get(): Promise<User> {
    return this.httpTransport
      .get('/auth/me');
  }

  public resetPassword(email: string): Promise<void> {
    return this.httpTransport
      .post(
        '/auth/forgot-password',
        { email: email },
      );
  }

  public changePassword(payload: ChangePasswordRequest): Promise<void> {
    return this.httpTransport
      .post(
        '/auth/reset-password',
        payload,
      );
  }
}
