export default interface RegisterAdditionalInfoRequest {
  id: number;
  email: string;
  name: string;
  genderPreferences: string;
  gender: string;
  age: number;
  weight: number;
  height: number;
  about: string;
  location: string;
  interests: Array<string>;
  hobbies: Array<string>;
}
