export default interface Profile {
  userId: number,
  media?: any,
  description?: string,
  age?: number,
  height?: number,
  weight?: number,
  locations?: string,
  purposes?: string,
  contacts?: Array<string>,
  popularity: number
}
