import User from '@/bundles/common/entity/User';

export default interface UserState {
  isAuthorized: boolean;
  user: User | undefined;
}

export function createUserState(props: Partial<UserState> = {}): UserState {
  return {
    isAuthorized: false,
    user: undefined,
    ...props,
  };
}
