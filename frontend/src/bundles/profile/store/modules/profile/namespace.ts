import { generateCommandName } from '@/bundles/common/helpers/storeHelpers';

const namespace = 'profile';

export function getProfileCommandName(command: string): string {
  return generateCommandName(
    namespace,
    command,
  );
}

export default namespace;
