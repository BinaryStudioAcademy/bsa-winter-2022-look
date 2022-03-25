import Message from '@/bundles/common/entity/Message';

export default interface MessagesState {
  messages: Message | undefined;
}

export function createMessagesState(): MessagesState {
  return {
    messages: undefined,
  };
}
