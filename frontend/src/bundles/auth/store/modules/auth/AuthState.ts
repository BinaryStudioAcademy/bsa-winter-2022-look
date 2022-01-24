import User from '@/bundles/common/entity/User';

export default interface AuthState {
  user: User | undefined;
}

export function createAuthState(): AuthState {
  return {
    user: undefined,
  };
}
