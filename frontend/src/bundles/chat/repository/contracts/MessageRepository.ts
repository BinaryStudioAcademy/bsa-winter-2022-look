import Message from '@/bundles/common/entity/Message';

export default interface MessageRepository {
    /**
    * Get Messages
    *
    */
  get(): Promise<Message>;
}
