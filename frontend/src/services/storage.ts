class Storage {
  store: globalThis.Storage;
  tokenKeyName: string;
  tokenTypeKeyName: string;

  constructor() {
    this.tokenKeyName = 'auth.access_token';
    this.tokenTypeKeyName = 'auth.token_type';
    this.store = window.localStorage;
  }

  get(key: string) {
    return this.store.getItem(key);
  }

  set(key: string, value: any) {
    return this.store.setItem(key, value);
  }

  getToken() {
    return this.get(this.tokenKeyName);
  }

  setToken(token: string) {
    return this.set(this.tokenKeyName, token);
  }

  hasToken() {
    return !!this.get(this.tokenKeyName);
  }

  removeToken() {
    return this.store.removeItem(this.tokenKeyName);
  }

  getTokenType() {
    return this.get(this.tokenTypeKeyName);
  }

  setTokenType(type: string) {
    return this.set(this.tokenTypeKeyName, type);
  }

  removeTokenType() {
    return this.store.removeItem(this.tokenTypeKeyName);
  }
}

export default new Storage();
