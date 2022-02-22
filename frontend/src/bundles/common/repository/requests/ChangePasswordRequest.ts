export default interface ChangePasswordRequest {
  password: string;
  passwordConfirmation: string;
  token: string;
}
