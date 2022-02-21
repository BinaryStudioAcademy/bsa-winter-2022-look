export function generateCommandName(...commandParts: string[]): string {
  return commandParts.join('/');
}
