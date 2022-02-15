export default interface ChangePasswordRequest {
  password: string;
  password_confirmation: string;
  token: string;
}
