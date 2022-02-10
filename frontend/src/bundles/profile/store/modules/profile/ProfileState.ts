export default interface ProfileState {
  profile: undefined
}

export function createProfileState(): ProfileState {
  return {
    profile: undefined,
  };
}
