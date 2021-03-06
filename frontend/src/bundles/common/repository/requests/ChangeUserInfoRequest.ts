export default interface ChangeUserInfoRequest {
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
  instagram: string;
  facebook: string;
  other: string;
}
