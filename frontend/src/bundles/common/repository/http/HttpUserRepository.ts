import User from '@/bundles/common/entity/User';
import HttpTransport from '@/services/contracts/HttpTransport';
import UserRepository from '../contracts/UserRepository';
import UserLoginRequest from '../requests/UserLoginRequest';
import UserRequest from '../requests/UserRequest';
import Storage from '@/services/storage';
import ResetPasswordRequest from '../requests/ResetPasswordRequest';
import { APP_API_URL } from '@/bundles/auth/store/modules/auth/constants';

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

  public resetPassword(payload: ResetPasswordRequest): Promise<void> {
    return this.httpTransport
      .post(
        APP_API_URL + '/api/v1/auth/forgot-password',
        { email: payload },
      );
  }
}
