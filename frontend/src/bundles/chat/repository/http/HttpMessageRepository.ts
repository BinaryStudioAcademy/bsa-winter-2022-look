import Message from '@/bundles/common/entity/Message';
import HttpTransport from '@/services/contracts/HttpTransport';
import MessageRepository from '../contracts/MessageRepository';
import Storage from '@/services/storage';

export default class HttpMessageRepository implements MessageRepository {
  private readonly httpTransport: HttpTransport;

  constructor(httpTransport: HttpTransport) {
    this.httpTransport = httpTransport;
  }

  public get(): Promise<Message> {
    return this.httpTransport
      .get('/auth/me');
  }
}
