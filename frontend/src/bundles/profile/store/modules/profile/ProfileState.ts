import User from '@/bundles/common/entity/User';

export default interface ProfileState {
  user: User | undefined;
}

export function createProfileState(): ProfileState {
  return {
    user: undefined,
  };
}
