export default interface ChangePasswordRequest {
  password: string;
  // eslint-disable-next-line camelcase
  password_confirmation: string;
  token: string;
}
