import Profile from '../../entity/Profile';

export default interface ProfileRequest {
  userId: number,
  settings: Profile;
}
